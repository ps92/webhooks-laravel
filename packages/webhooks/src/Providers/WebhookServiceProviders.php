<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 04-Nov-16
 * Time: 11:35 AM
 */

namespace Prateek\Webhooks\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Prateek\Webhooks\Commands\forgotPassword;
use Prateek\Webhooks\Commands\site247;

class WebhookServiceProviders extends ServiceProvider {
    protected $namespace = '\Prateek\Webhooks\Http\Controllers'; //config('webhooks.namespace', null);

    public function boot() {
        parent::boot();
        $this->namespace = config('webhooks.namespace', $this->namespace);
        //publish_routes
        $this -> publishConfirguration();
        $this -> map();
    }

    function register() {
        parent::register();
        $this -> registerCommands();
    }

    public function map() {
        $this -> mapHookRoutes();
    }

    public function registerCommands() {
        $this -> app['get.site247'] = $this -> app -> share(function () {
            return new site247();
        });
        $this -> app['trigger.forgotpassword'] = $this -> app -> share(function () {
            return new forgotPassword();
        });
        $this -> commands(
                'get.site247',
                'trigger.forgotpassword'
            );
    }

    /*
    private function publishConfiguration() {
        if (file_exists(config_path('webhooks')))
            $callback = '$this -> mergeConfigFrom';
        else
            $callback = '$this -> publishes';
        call_user_func($callback, )
    }
    */

    private function publishConfirguration() {
        $this -> publishes([
            base_path('packages/webhooks/transports/config/webhooks.php') => config_path('webhooks.php')
        ], 'configurations');
    }
    /*

    private function publishRoutes() {
        $this ->
    }
    */

    protected function mapHookRoutes() {
        Route::group([
            'namespace'  => $this->namespace,
            "prefix"     => "hooks"
        ], function ($router) {
            require base_path('/packages/webhooks/src/Routes/hooks.php');
        });
    }
}
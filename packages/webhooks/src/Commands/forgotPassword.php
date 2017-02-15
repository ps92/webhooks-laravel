<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 14-Nov-16
 * Time: 12:22 PM
 */

namespace Prateek\Webhooks\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Prateek\Webhooks\Facades\site247Payload;
use Prateek\Webhooks\Facades\forgotPassword as forgotPasswordFacade;

class forgotPassword extends Command {
    protected $signature = 'trigger:forgotpassword';
    protected $description = 'To see if the forgot password is working on the platform. ';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $handler = new forgotPasswordFacade(new Client(), config('webhooks.forgotPassword.targetEmail'));
        $handler -> checkForIssue();
    }
}
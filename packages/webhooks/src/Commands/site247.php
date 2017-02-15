<?php

namespace Prateek\Webhooks\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Prateek\Webhooks\Facades\site247Payload;

class site247 extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:site247';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the data from the site247 and logs it. ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $handler = new site247Payload(new Client([
            'base_uri' => 'https://www.site24x7.com'
        ]));
        $handler -> readStats();
    }
}

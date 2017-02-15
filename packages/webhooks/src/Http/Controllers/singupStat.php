<?php

namespace Prateek\Webhooks\Http\Controllers;

use Illuminate\Http\Request;
use Prateek\Facades\payloadParser;
use Prateek\Webhooks\Providers;
use Illuminate\Routing\Controller as Controller;


class singupStat extends payloadParser  {

    private $payloadArray = null;

    public function __construct($payload) {
        $this->payloadArray = $payload;
    }

    function function1() {
        echo base_path();
    }
}

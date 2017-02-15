<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 14-Nov-16
 * Time: 12:18 PM
 */

namespace Prateek\Webhooks\Facades;

use GuzzleHttp\Client;

class forgotPassword {
    protected $httpClient = null;
    protected $emailAddtess = null;

    function __construct(Client $client, $emailAddress) {
        $this -> httpClient = $client;
        $this -> emailAddtess = $emailAddress;
        $forgotTrigger = $this -> httpClient -> request("POST", "https://www.appzoojoo.be/auth/forgot_password", [
                "headers" => [
                    "Content-Type"  => "application/x-www-form-urlencoded"
                ],
                "form_params" => [
                    "email" => "prateek@zoojoo.be",
                    "forgotpassForm" => "Submit"
                ]
            ]
        );
    }

    function checkForIssue() {
        $response = $this -> httpClient -> request(
            "POST",
            config('webhooks.forgotPassword.targetAPIuri')."/forgotPass", [
                "json" => [
                    "emailAddress"  => $this->emailAddtess
                ]
            ]
        );
        print_r($response -> getBody() -> getContents());
        //TODO
    }

}
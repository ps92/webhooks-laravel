<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 14-Nov-16
 * Time: 4:42 AM
 */

namespace Prateek\Webhooks\Facades;

use GuzzleHttp\Client;
use Prateek\Webhooks\Contracts\readFromSite247;
use Prateek\Webhooks\Models\Site247Stats;

class site247Payload implements readFromSite247
{

    protected $token = "Zoho-authtoken ";
    protected $authorization = [
        "username" => "#",
        "password" => "#"
    ];
    protected $httpClient = null;

    function __construct(Client $client)
    {
        $this->httpClient = $client;
        $this->authorize();
    }

    function authorize()
    {
        $response = $this->httpClient->request("POST", "https://accounts.zoho.com/apiauthtoken/nb/create", [
            'form_params' => [
                "SCOPE" => "Site24x7/site24x7api",
                "EMAIL_ID" => $this->authorization["username"],
                "PASSWORD" => $this->authorization['password']
            ]
        ]);
        //$this -> token .= $this->parseToken($response -> getBody() -> read(1024));
        $this->token .= "53ced45226d69c62wefwebc31f66eb1efe4a9";      //these do not expire; infirtunately.
    }

    private function parseToken($str)
    {
        $x = explode("\n", $str);
        return ($x[3] !== "RESULT=TRUE") ? '' : explode('=', $x[2])[1];
    }

    function readStats()
    {
        $response = $this->httpClient->request(
            "GET",
            "/api/reports/availability_summary/190353000000088013?period=3&unit_of_time=2", [
            "headers" => [
                "Accept" => "application/json; version=2.0",
                "Authorization" => $this->token
            ],
            "stream"  => true
        ]);
        $contentData = (\GuzzleHttp\json_decode($response -> getBody() -> getContents()))
            -> data -> charts[0] -> data;

        foreach ($contentData as $item => $value) {
            $model = new Site247Stats();
            $model -> reference = (explode('+',$value[0])[0]);
            $model -> uptime = $value[1];
            $model -> donwtime = $value[2];
            $model -> maintainence = $value[3];
            try  {
                $model -> save();
            }
            catch (\PDOException $exception) {
            }
        }
    }
}
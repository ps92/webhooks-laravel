<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 04-Nov-16
 * Time: 5:50 PM
 */

namespace Prateek\Webhooks\Contracts\Http;

interface payloadManipulator {

    function decryptData();

    static function validateData();

    function insertData();

}
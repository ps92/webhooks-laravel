<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 04-Nov-16
 * Time: 5:52 PM
 */

namespace Prateek\Webhooks\Facades;

use Prateek\Webhooks\Contracts\Http\payloadManipulator as manipulator;

abstract class payloadParser implements manipulator {

    protected $payload;

    function decryptData() {
        // TODO: Implement decryptData() method.
    }

    static function validateData($rules = null) {
        // TODO: Implement validateData() method.
        //todo check the rules here with the help of an array.
    }

    function insertData() {
        //todo do with eloquent
    }
}
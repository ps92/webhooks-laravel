<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 04-Nov-16
 * Time: 4:45 PM
 */

namespace Prateek\Facades;

use Illuminate\Http\Request;
use Prateek\Contracts\Http\Parser as Parsing;

class Parser implements Parsing {
    function parse(Request $request) {
        $controller = $request -> input('requestType');
        switch ($controller) {
            case "emailStatistics":
                break;
            case "singupStat":
                break;
            case "forgotPassword":
                break;
        }
        return FALSE; 
    }
}
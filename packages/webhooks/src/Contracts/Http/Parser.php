<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 04-Nov-16
 * Time: 3:21 PM
 */

namespace Prateek\Contracts\Http\Parser;

use Illuminate\Http\Request as Requests;

interface Parser {
    public function parse(Requests $request);
}
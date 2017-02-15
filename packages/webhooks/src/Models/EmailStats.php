<?php
/**
 * Created by PhpStorm.
 * User: ps92
 * Date: 13-Nov-16
 * Time: 2:57 PM
 */

namespace Prateek\Webhooks\Models;

use Illuminate\Database\Eloquent\Model;

class EmailStats extends Model {
    protected $table = "email_stats";
    protected $guarded = ['*'];
    //public $timestamps = false;
}
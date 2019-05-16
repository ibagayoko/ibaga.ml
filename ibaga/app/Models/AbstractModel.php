<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class AbstractModel extends Model
{

    // /**
    //  * Determine if a model actiity should be logged
    //  */
    // protected static $logActivity = false;
    // protected static function boot()
    // {
    //     parent::boot();
    //     if (static::$logActivity) {
    //         static::created(function ($model) {

    //             activity()
    //                 ->performedOn($model)
    //                 ->causedBy(Auth::user())
    //                 ->withProperties([
    //                 ])
    //                 ->log('Account Created');
    //         });

    //     }
    // }
}

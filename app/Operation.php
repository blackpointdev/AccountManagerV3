<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'name', 'amount', 'userId'
    ];

    protected $hidden = [

    ];
}

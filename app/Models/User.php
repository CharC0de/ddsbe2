<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;




// change namespace to App\Models if you put your model inside models
namespace App\Models;

// library to create Model under lumen
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    // name of table
    protected $table = 'tbluser';
    // column sa table
    protected $fillable = [
        'username', 'password', 'gender', 'jobid'
    ];

    // The code below will not require the field create_at and update_at in lumen
    public $timestamps = true;

    // The code will customized your primary key field name, default in lumen is id
    protected $primaryKey = 'userid';


    // fields that should be hidden like password
    // The attributes excluded from the model's JSON form.
    protected $hidden = [
        'password',
    ];
}
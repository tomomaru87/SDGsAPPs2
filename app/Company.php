<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        'id',
        'pj_name',
        'company_name',
        'company_mail',
        'password',
        'company_contents',
        'link',
        'msg',
        'history',
       
        
    ];
}

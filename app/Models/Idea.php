<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Idea extends Authenticatable
{
    protected $fillable = [
        'name', 
        'email',
        'company',
        'idea_name',
        'number',
        'idea_details',
        'budget',
        'target',
        'marketing',
        'updated_at',
        'created_at',
        
    ];
        
}

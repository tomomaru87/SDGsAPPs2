<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable =[
        'submission_company',
        'idea_name',
        'number',
        'company_image',
        'idea_details',
        'budget',
        'target',
        'marketing',
        'make_person'
       
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WidgetTwo extends Model
{
    use HasFactory;


    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'widget_two', 'widget_two_lebels', 'widget_two_links',
    ];
}

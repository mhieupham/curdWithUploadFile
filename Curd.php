<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curd extends Model
{
    //
    protected $table = 'sample_data';
    protected $fillable = ['first_name','last_name','image'];
}

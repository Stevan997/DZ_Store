<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proizvodi extends Model
{
    protected $table = 'proizvodi';
    protected $primaryKey = 'JSP';
    public $timestamps = false;
    protected $guarded = [];
}

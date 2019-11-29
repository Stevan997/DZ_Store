<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slike extends Model
{
    protected $table = 'glavne_fotografije';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = [];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stavke extends Model
{
    protected $table = 'stavke_racuna';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = [];
}

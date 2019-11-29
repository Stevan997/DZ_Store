<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racun extends Model
{
    protected $table = 'racun';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $guarded = [];

    // public function stavke()
    // {
    //     return $this->hasMany('App\Stavke');
    // }
    // public function user()
    // {
    //     return $this->hasOne('App\User', 'foreign_key');
    // }
}

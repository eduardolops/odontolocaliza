<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [ 'name', 'uf' ];

    // public function cities()
    // {
    // 	return return $this->hasMany('Doctor\Models\City');
    // }
}

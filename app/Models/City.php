<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [ 'uf', 'name' ];

    // public function state()
    // {
    // 	return return $this->belongsTo('Doctor\Models\State');
    // }
}

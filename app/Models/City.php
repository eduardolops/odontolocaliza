<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [ 'id_state', 'name' ];

    // public function state()
    // {
    // 	return return $this->belongsTo('Doctor\Models\State');
    // }
}

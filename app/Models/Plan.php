<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [ 'name', 'price', 'discount', 'time_plan' ];

    public function invoice()
	{
	    return $this->belongsTo(Shopping::class, 'id_plan', 'id');
	}
}

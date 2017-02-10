<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class InfoComplementary extends Model
{	
	protected $table = 'info_complementaries';
    protected $fillable = [ 'info_name', 'image', 'status' ];
	public $timestamps = false;
}

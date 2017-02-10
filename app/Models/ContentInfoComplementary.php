<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class ContentInfoComplementary extends Model
{	
	protected $table = 'content_info_complementaries';
    protected $fillable = [ 'info_id', 'user_id', 'description', 'status' ];
	public $timestamps = false;
}

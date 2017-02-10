<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class ConvenantsAcceptsDoctor extends Model
{	
	protected $table = 'convenants_accepts_doctors';
    protected $fillable = [ 'user_id', 'convenant_id' ];
	public $timestamps = false;
}

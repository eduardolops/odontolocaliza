<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{	
	protected $table = 'healthinsurances';

    protected $fillable = [ 'name' ];
}

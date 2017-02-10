<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializationDoctor extends Model
{	
	protected $table = 'specialization_doctors';

	public $timestamps = false;

    protected $fillable = [ 'user_id', 'specialization_id' ];
    


	public function doctor()
    {
        return $this->belongsTo(User::class);
    }

}

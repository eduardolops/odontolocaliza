<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    protected $fillable = [
    	'user_id',
        'filePath'
    ];


    public function doctor()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}

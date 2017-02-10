<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    
    protected $fillable = [
    	'user_id',
        'name',
        'link',
    ];


    public function doctor()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}

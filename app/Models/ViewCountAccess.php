<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class ViewCountAccess extends Model
{
    protected $table = 'view_count_access';
 	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'user_id', 'view', 'type_view', 'agent_name', 'ip'
    ];

    public function doctor()
    {
        return $this->belongsTo(ViewCountAccess::class, 'user_id', 'id');
    }
}

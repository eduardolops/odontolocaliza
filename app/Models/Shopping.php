<?php

namespace Doctor\Models;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $fillable = ['id_doctor','id_plan', 'descrition', 'price', 'discount', 'amount', 'payment_type', 'order_status', 'plots' ];

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }

    public function plano()
    {
        return $this->hasOne(Plan::class, 'id', 'id_plan');
    }
}

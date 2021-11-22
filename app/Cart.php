<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

	protected $appends =['total_paid'];


    public function order()
    {
        return $this->hasOne(Order::class, 'order_id', 'order_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id', 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalPaidAttribute()
    {
        return $this->payments->sum('amount');
    }
}

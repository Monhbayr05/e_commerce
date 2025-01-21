<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'total',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}

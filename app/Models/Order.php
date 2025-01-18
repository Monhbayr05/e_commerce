<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'total',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}

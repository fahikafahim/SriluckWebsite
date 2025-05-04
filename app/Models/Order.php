<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'order_date',
        'total_amount',
        'shipping_address',
        'payment_method',
        'order_status',
    ];
// An order belongs to a user (customer)
public function user(){
    return $this->belongsTo(User::class);
}


}

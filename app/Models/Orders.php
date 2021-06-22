<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orders extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function orderCoupon(): HasOne
    {
        return $this->hasOne(OrderCoupon::class,'order_id','id');
    }
    public function orderTax(): HasOne
    {
        return $this->hasOne(OrderTax::class,'order_id','id');
    }
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class,'order_id','id');
    }

    public function orderPayment(): HasOne
    {
        return $this->hasOne(OrderPayment::class,'order_id','id');
    }

    public function orderShippedAddress(): HasOne
    {
        return $this->hasOne(OrderShippingAddress::class, 'order_id', 'id');
    }


}

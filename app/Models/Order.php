<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function total(): Attribute
    {
        return new Attribute(
            get: function () {
                $total = 0;

                foreach ($this->items as $item) {
                    $total += $item->price * $item->quantity;
                }

                return $total;
            }
        );
    }

    public function deliveryAddress(): Attribute
    {
        return new Attribute(
            get: function () {
                return
        $this->address.'<br>'.
        $this->city.'<br>'.
        $this->state.'<br>'.
        $this->zip.'<br>'.
        $this->country;
            }
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

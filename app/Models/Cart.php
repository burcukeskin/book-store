<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $connection = 'mysql';

    protected $table = 'cart';

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'quantity',
    ];


    public function toArray()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
        ];

    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}

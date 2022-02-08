<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $connection = 'mysql';

    protected $table = 'checkout';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'city',
        'notes',
    ];


    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'notes' => $this->notes,
        ];

    }
}

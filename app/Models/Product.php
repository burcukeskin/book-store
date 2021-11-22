<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mysql';

    protected $table = 'product';

    protected $fillable = [
        'title',
        'author',
        'image',
        'price',
    ];
    private $title;
    private $author;
    private $image;
    private $price;


    public function toArray()
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'image' => $this->image,
            'price' => $this->price,
        ];

    }
}




<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'products';
    protected $guarded = [];
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'stock',
        'image'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function transaction_detail()
    {
        return $this->belongsTo(TransactionDetail::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}

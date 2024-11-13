<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $table = 'carts';
    protected $guarded = [];
    protected $fillable = [
        'student_id',
        'product_id',
        'quantity'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

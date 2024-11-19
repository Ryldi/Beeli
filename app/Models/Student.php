<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    
    protected $table = 'students';
    protected $guarded = [];
    protected $fillable = [
        'email',
        'password',
        'username',
        'phone'
    ];

    public function carts ()
    {
        return $this->hasMany(Cart::class);
    }

    public function transactions ()
    {
        return $this->hasMany(TransactionHeader::class);
    }

    public function addresses ()
    {
        return $this->hasMany(Address::class);
    }
}

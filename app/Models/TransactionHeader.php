<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionHeaderFactory> */
    use HasFactory;

    protected $table = 'transaction_headers';
    protected $guarded = [];
    protected $fillable = [
        'status',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}

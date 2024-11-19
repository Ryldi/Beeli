<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $guarded = [];
    protected $fillable = [
        'student_id',
        'recipient_name',
        'phone',
        'street',
        'subdistrict',
        'city',
        'province',
        'postal_code',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}

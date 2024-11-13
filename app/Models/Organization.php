<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory;

    protected $table = 'organizations';
    protected $guarded = [];
    protected $fillable = [
        'name',
        'acronym',
        'email',
        'password',
        'description',
        'balance',
        'logo',
        'region',
        'phone',
        'university_id',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

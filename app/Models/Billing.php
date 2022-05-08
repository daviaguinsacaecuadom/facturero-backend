<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable=[
        'num_invoice',
        'type',
        'status',
        'mount',
        'signature',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'cpf',
        'gender',
        'phone',
        'address',
        'address_number',
        'district',
        'cep',
        'year_of_birth',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

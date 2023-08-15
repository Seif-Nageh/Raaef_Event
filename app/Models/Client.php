<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'second_phone',
        'state',
        'city',
        'address',
        'gender',
        'category',
        'type',
        'company_name',

    ];


    public function addBy()
    {
        return $this->belongsTo(User::class, 'add_by');
    }
}

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
        'category',
        'type',
        'company_name',
    ];


    public function addBy()
    {
        return $this->belongsTo(User::class, 'add_by');
    }

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'foreign_key');
    // }



    // If the parent model does not use id as its primary key, or you wish to find the associated model using a different column, you may pass a third argument to the belongsTo method specifying the parent table's custom key:

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    // }
}

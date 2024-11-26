<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Batiment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address',
    ];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function supports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Support::class);
    }
}

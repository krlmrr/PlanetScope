<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scope extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function status(): HasOne
    {
        return $this->hasOne(ScopeStatus::class, 'id', 'scope_status_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scope extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function status()
    {
        return $this->hasOne(ScopeStatus::class, 'id', 'scope_status_id');
    }
}

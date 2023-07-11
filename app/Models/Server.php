<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function domain()
    {
        return $this->hasMany(Domain::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}

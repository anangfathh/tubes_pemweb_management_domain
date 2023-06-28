<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function response()
    {
        return $this->hasMany(Response::class);
    }
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function image()
    {
        return $this->hasMany(DomainImage::class);
    }

    public function scopeOwner($query, string $userId)
    {
        return $query->where(
            'user_id',
            $userId
        );
    }

    public function isOwner(string $userId): bool
    {
        if ($this->user_id == $userId) {
            return true;
        }

        return false;
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}

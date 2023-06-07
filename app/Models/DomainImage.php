<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function domain()
    {
        return $this->belonsTo(Domain::class);
    }

    public function scopeDomainId($query, $domainId)
    {
        return $query->where('domain_id', $domainId);
    }
}

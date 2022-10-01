<?php

namespace App\Models;

use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Singer;

class Song extends Model
{
    public function singer()
    {
        return $this->belongsToMany(singer::class);
    }
}

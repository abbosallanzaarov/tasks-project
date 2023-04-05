<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forward;
use App\Models\User;
use App\Models\Done;


class Tasks extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function forwards()
    {
        return $this->hasMany(Forward::class);
    }
    public function from()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function done()
    {
        return $this->belongsTo(User::class);
    }
}

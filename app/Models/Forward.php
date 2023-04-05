<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tasks;
use App\Models\User;

class Forward extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function task()
    {
        return $this->belongsTo(Tasks::class);
    }
    public function from()
    {
        return $this->belongsTo(User::class);
    }
}

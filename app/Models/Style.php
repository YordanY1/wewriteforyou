<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ['name', 'slug'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

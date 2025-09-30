<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'currency_id'];

    public function orderAddons()
    {
        return $this->hasMany(OrderAddon::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}

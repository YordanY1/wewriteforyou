<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'words',
        'd7',
        'd3',
        'd2',
        'd1',
        'h12',
        'currency_id',
        'type',
    ];


    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}

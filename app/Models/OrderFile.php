<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFile extends Model
{
    protected $fillable = ['order_id', 'type', 'path', 'original_name', 'mime_type', 'size'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

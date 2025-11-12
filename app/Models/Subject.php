<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class Subject extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'slug'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}

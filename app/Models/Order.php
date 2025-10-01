<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'assignment_type_id',
        'service_id',
        'academic_level_id',
        'subject_id',
        'language_id',
        'style_id',
        'words',
        'pages',
        'deadline_option',
        'deadline_at',
        'instructions',
        'status',
        'base_price',
        'final_price',
        'currency_id',
        'reference_code',
        'topic'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignmentType()
    {
        return $this->belongsTo(AssignmentType::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function academicLevel()
    {
        return $this->belongsTo(AcademicLevel::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function addons()
    {
        return $this->hasMany(OrderAddon::class);
    }

    public function files()
    {
        return $this->hasMany(OrderFile::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    protected static function booted()
    {
        static::deleting(function ($order) {
            $order->addons()->delete();
            $order->files()->delete();
            $order->statusHistories()->delete();
        });
    }
}

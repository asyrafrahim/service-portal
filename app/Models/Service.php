<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'description', 'attachment_1', 'user_id'];
    // protected $fillable = ['title', 'description', 'attachment_1', 'attachment_2'];
    // protected $table = 'services';

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
    // public function categoroies()
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_service', 'category_id', 'service_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
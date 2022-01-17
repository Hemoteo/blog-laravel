<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'create_at', 'updated_at'];

    // Relación 'one to many' inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación 'one to many' inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación 'many to many'
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relación 'one to one' polimórfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

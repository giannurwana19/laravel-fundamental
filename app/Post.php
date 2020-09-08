<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // k: one to many
    // bisa juga user()
    // jika namanya beda, definisikan foreign key nya 
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}




























// ===================================================


// k: fiilable lebih aman dari guard, jika untuk forum, karena takutnya ada user yang mengedi input yang tidak kita inginkan

// k: guraded lebih singkat jika digunakan untuk data yang kita input sendiri

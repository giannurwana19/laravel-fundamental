<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'tumbnail'];

    // cara lain  eager loading
    protected $with = ['author', 'category', 'tags'];

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

    // k: cara panggilnya dengan $post->getImage
    public function getImage()
    {
        if ($this->tumbnail) {
            return asset('storage') . '/' . $this->tumbnail;
        }

        return asset('storage/images/posts/default-photo.jpg');
    }

    // jika kita ingin panggil sebagai attribute
    // k: cara panggilnya dengan $post->image
    public function getImageAttribute()
    {
        if($this->tumbnail){
            return asset('storage') . '/' . $this->tumbnail;
        }
        
        return asset('storage/images/posts/default-photo.jpg');
    }
}




























// ===================================================


// k: fiilable lebih aman dari guard, jika untuk forum, karena takutnya ada user yang mengedi input yang tidak kita inginkan

// k: guraded lebih singkat jika digunakan untuk data yang kita input sendiri

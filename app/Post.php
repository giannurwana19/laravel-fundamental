<?php

namespace App;

use GuzzleHttp\Psr7\FnStream;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // h: etika buat funtion di model, itu dibaca per item, bukan keseluruhan dari model itu
    // solusinya guakan keyword scope 
    public function scopeLatestFirst()
    {
        return $this->latest()->first();
    }

    public function scopeLatestPost()
    {
        return $this->latest()->get();
    }
}

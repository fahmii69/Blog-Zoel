<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public function post()
    {
        return $this->hasMany(Post::class, 'tag_id');
    }
}

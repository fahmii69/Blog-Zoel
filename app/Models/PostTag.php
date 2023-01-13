<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';
    protected $guarded = [];

    public $appends = ['tag_list'];

    public function tags()
    {
        return $this->belongsTo(Tags::class, 'tag_id');
    }

    public function getTagListAttribute()
    {
        return $this->tags->tag_name;
    }
}

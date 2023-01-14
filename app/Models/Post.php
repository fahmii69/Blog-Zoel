<?php

namespace App\Models;

use App\Models\Concerns\UploadedFiles;
use App\Models\Contracts\UploadedFilesInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements UploadedFilesInterface
{
    use HasFactory, UploadedFiles;

    protected $table = 'posts';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->hasMany(PostTag::class, 'post_id',);
    }

    /**
     * set column from database for upload file
     *
     * @return string
     */
    public function fileColumn(): string
    {
        return 'post_image';
    }

    /**
     * set uploaded file path
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return 'images';
    }

    /**
     * set uploaded file storage name
     *
     * @return string
     */
    public function getStorageName(): string
    {
        return 'public';
    }
}

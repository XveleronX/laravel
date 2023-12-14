<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'comment',
        'username'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'containt',
        'epilog',
        'image',
        'views',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function mostViewed()
    {
        return Blog::query()->orderBy('views', 'desc')->limit(30)->get();
    }

    public static function mostRecent()
    {
        return Blog::query()->orderBy('created_at', 'desc')->limit(30)->get();
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}

<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/* Par default quand on crée un nouveau model, ma table qui lui est associée c'est le nom de la class en minuscule avec un 's' à la fin */

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'reading_time', 'img',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }
}

<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/* Par default quand on crée un nouveau model, ma table qui lui est associée c'est le nom de la class en minuscule avec un 's' à la fin */

class Post extends Model
{
    // protected $primaryKey = 'post_id';
    
    protected $fillable = [
        'user_id', 'title', 'slug', 'body', 'reading_time', 'img',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc'); /* si erreur remettre id */
    }
            // erreur sur recherche des post_post_id pour la relation table comments 

}

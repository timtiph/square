<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* Par default quand on crée un nouveau model, ma table qui lui est associée c'est le nom de la class en minuscule avec un 's' à la fin */

class User extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name', 'email', 'password',
    ];
}
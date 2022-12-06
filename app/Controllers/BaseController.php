<?php

declare(strict_types=1);

namespace App\Controllers;

use Faker\Factory;
use Tmoi\Foundation\AbstractController;
// use Tmoi\Foundation\Router\Router; 
use Tmoi\Foundation\View;

class BaseController extends AbstractController
{
    public function index(): void
    {
        $faker = Factory::create();
        // echo Router::get ('index');
        View::render('index', [
            'city' => $faker->city,
        ]);
        // echo "<h3> Laissez moi deviner ! Vous vivez à $faker->city ?</h3>";
    }

}

<?php

declare(strict_types=1);

namespace App\Controllers;


use Tmoi\Foundation\AbstractController;
use Tmoi\Foundation\Authentication as Auth;
use Tmoi\Foundation\View;

;

class HomeController extends AbstractController
{
    public function index(): void
    {
        if (!Auth::check()) {
            $this->redirect('login.form');
        }
        $user = Auth::get();
        View::render('home', [
            'user' => $user,
        ]);
    }
}

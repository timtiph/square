<?php

declare(strict_types=1);

namespace App\Controllers;


use Tmoi\Foundation\AbstractController;
use Tmoi\Foundation\Authentication as Auth;
use Tmoi\Foundation\View;

class AuthController extends AbstractController
{
    public function registerForm(): void
    {
        if (Auth::check()) {
            $this->redirect('home');
        }
        View::render('auth.register');
    }
}

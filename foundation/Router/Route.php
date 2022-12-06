<?php

declare(strict_types=1);

namespace Tmoi\Foundation\Router;

use Tmoi\Foundation\AbstractController;
use Symfony\Component\Routing\Route as SymfonyRoute;

class Route
{
    public const HTTP_METHODS = ['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE'];

    public static function __callStatic(string $httpMethod, array $arguments): SymfonyRoute
    {
        if (!in_array(strtoupper($httpMethod), static::HTTP_METHODS)) {
            throw new \BadMethodCallException(
                sprintf('Méthode http indisponible (%s)', $httpMethod)
            );
        }
        [$uri, $action] = $arguments;
        return static::make($uri, $action, $httpMethod);
    }

    protected static function make(string $uri, array $action, string $httpMethod): SymfonyRoute
    {
        [$controller, $method] = $action;

        if (!static::checkIfActionExists($controller, $method)) {
            throw new \InvalidArgumentException(
                sprintf('L\'action n\exixte pas (%s)', implode(', ', $action))
            );
        }
        return new SymfonyRoute(
            $uri,
            [
                '_controller' => $controller,
                '_method' => $method,

            ],
            methods: [$httpMethod],
            options: [
                'utf8' => true,
            ]
        );
    }

    protected static function checkIfActionExists(string $controller, string $method): bool
    {
        return class_exists($controller) && is_subclass_of($controller, AbstractController::class) && method_exists($controller,  $method);
    }
}

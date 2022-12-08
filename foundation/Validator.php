<?php

declare(strict_types=1);

namespace Tmoi\Foundation;

use Illuminate\Database\Capsule\Manager as Capsule;
use Valitron\Validator as ValitronValidator;

class Validator
{
    public static function get(array $data): ValitronValidator
    {
        $validator = new ValitronValidator(
            data: $data,
            lang: 'fr'
        );
        $validator->labels(require ROOT . '/resources/lang/validation.php');
        static::addCustomRules($validator);
        return $validator;
    }

    protected static function addCustomRules(ValitronValidator $validator): void
    {
        $validator->addRule('unique', function (string $field, mixed $value, array $params, array $fields) {
            return !Capsule::table($params[1])->where($params[0], $value)->exists();
        }, '{field} est invalide');

        $validator->addRule('password', function (string $field, mixed $value, array $params, array $fields) {
            $user = Authentication::get();
            return password_verify($value, $user->password);
        }, '{field} est erroné');
    }
}

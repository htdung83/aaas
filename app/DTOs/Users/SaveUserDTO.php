<?php

namespace App\DTOs\Users;

use WendellAdriel\ValidatedDTO\Casting\StringCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class SaveUserDTO extends ValidatedDTO
{
    public string $name;
    public string $email;
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'name' => new StringCast(),
            'email' => new StringCast(),
        ];
    }
}

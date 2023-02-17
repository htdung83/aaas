<?php

namespace App\DTOs\Users;

use WendellAdriel\ValidatedDTO\Casting\BooleanCast;
use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class FetchUsersDTO extends ValidatedDTO
{
    public int $page;
    public int $per_page;
    public bool $active_only;

    protected function rules(): array
    {
        return [
            'page' => ['sometimes', 'integer'],
            'per_page' => ['sometimes', 'integer'],
            'active_only' => ['sometimes', 'boolean'],
        ];
    }

    protected function defaults(): array
    {
        return [
            'page' => 1,
            'per_page' => 20,
            'active_only' => true,
        ];
    }

    protected function casts(): array
    {
        return [
            'page' => new IntegerCast(),
            'per_page' => new IntegerCast(),
            'active_only' => new BooleanCast(),
        ];
    }
}

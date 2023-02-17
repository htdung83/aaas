<?php

namespace App\Actions\Users;

use App\DTOs\Users\SaveUserDTO;
use App\Models\User;

class SaveUser
{
    public function __construct(
        private readonly ShowUser $showAction
    )
    {}

    public function handle(SaveUserDTO $dto, ?int $userId = null): User
    {
        $user = is_null($userId) ? new User() : $this->showAction->handle($userId);

        $user->fill($dto->toArray());

        $user->save();

        return $user;
    }
}

<?php

namespace App\Actions\Users;

use App\Models\User;

class DeleteUser
{
    public function __construct(
        private ShowUser $showAction
    )
    {}

    public function handle(int $userId): void
    {
        $user = $this->showAction->handle($userId);

        $user->delete();
    }
}

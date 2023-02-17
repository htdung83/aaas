<?php

namespace App\Actions\Users;

use App\Models\User;

class ShowUser
{
    public function handle(int $userId): User
    {
        return User::findOrFail($userId);
    }
}

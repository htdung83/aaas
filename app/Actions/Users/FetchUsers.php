<?php

namespace App\Actions\Users;

use App\DTOs\Users\FetchUsersDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FetchUsers
{
    public function handle(FetchUsersDTO $dto): Collection
    {
        $query = User::query();

        if ($dto->active_only) {
            $query->where('is_active', true);
        }

        return $query->skip(($dto->page - 1) * $dto->per_page)
            ->take($dto->per_page)
            ->get();
    }
}

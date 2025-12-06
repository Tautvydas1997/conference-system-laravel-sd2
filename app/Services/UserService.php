<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function all(): Collection
    {
        return User::with('roles')->get();
    }

    public function find(int $id): ?User
    {
        return User::with('roles')->find($id);
    }

    public function update(int $id, array $data): ?User
    {
        $user = User::find($id);

        if (!$user) {
            return null;
        }

        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);

        return $user->fresh();
    }

    public function getByRole(string $roleSlug): Collection
    {
        $role = Role::where('slug', $roleSlug)->first();

        if (!$role) {
            return new Collection();
        }

        return $role->users()->get();
    }
}

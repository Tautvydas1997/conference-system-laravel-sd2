<?php

namespace App\Services;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ConferenceService
{
    public function all(): Collection
    {
        return Conference::all();
    }

    public function find(int $id): ?Conference
    {
        return Conference::find($id);
    }

    public function create(array $data): Conference
    {
        return Conference::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'lecturers' => $data['lecturers'],
            'date' => $data['date'],
            'time' => $data['time'],
            'address' => $data['address'],
            'status' => $data['status'] ?? 'planned',
        ]);
    }

    public function update(int $id, array $data): ?Conference
    {
        $conference = Conference::find($id);
        
        if (!$conference) {
            return null;
        }

        $conference->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'lecturers' => $data['lecturers'],
            'date' => $data['date'],
            'time' => $data['time'],
            'address' => $data['address'],
        ]);

        if (isset($data['status'])) {
            $conference->update(['status' => $data['status']]);
        }

        return $conference->fresh();
    }

    public function delete(int $id): bool
    {
        $conference = Conference::find($id);

        if (!$conference) {
            return false;
        }

        // Cannot delete completed conferences
        if ($conference->status === 'completed') {
            return false;
        }

        $conference->delete();

        return true;
    }

    public function getPlanned(): Collection
    {
        return Conference::where('status', 'planned')->get();
    }

    public function registerUser(int $conferenceId, int $userId): bool
    {
        $conference = Conference::find($conferenceId);
        $user = User::find($userId);

        if (!$conference || !$user) {
            return false;
        }

        // Check if already registered
        if ($conference->users()->where('user_id', $userId)->exists()) {
            return false;
        }

        $conference->users()->attach($userId);

        return true;
    }

    public function getRegisteredUsers(int $conferenceId): Collection
    {
        $conference = Conference::find($conferenceId);

        if (!$conference) {
            return new Collection();
        }

        return $conference->users;
    }

    public function isUserRegistered(int $conferenceId, int $userId): bool
    {
        $conference = Conference::find($conferenceId);

        if (!$conference) {
            return false;
        }

        return $conference->users()->where('user_id', $userId)->exists();
    }
}

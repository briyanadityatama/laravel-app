<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function getUsersWithOrders(array $filters)
    {
        $query = User::query()->withCount('orders')->where('active', true);

        // Apply search
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('email', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Apply sorting
        $sortBy = $filters['sortBy'] ?? 'created_at';
        $query->orderBy($sortBy);

        // Pagination
        return $query->paginate(10, ['id', 'email', 'name', 'created_at']);
    }
}

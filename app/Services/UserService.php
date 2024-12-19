<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Events\UserCreated;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepository->create($data);

        // Trigger events for emails
        event(new UserCreated($user));

        return $user->only(['id', 'email', 'name', 'created_at']);
    }

    public function getUsers(array $filters)
    {
        return $this->userRepository->getUsersWithOrders($filters);
    }
}

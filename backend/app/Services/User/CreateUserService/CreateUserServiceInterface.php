<?php

namespace App\Services\User\CreateUserService;

use App\Models\User;

interface CreateUserServiceInterface
{
    public function execute(CreateUserServiceRequestDTO $request): User;
}
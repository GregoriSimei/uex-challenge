<?php

namespace App\Services\User\CreateUserService;

class CreateUserServiceRequestDTO
{
    public string $email;
    public string $name;
    public string $password;

    public function __construct(string $email, string $name, string $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }
}

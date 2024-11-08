<?php

namespace App\Services\User\CreateUserService;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreateUserService implements CreateUserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserServiceRequestDTO $request): User
    {
        $email = $request->email;
        $userFound = $this->userRepository->findByEmail($email);
        if($userFound) {
            throw new NotFoundHttpException("Email already registred");
        }

        $password = $request->password;
        $name = $request->name;
        $userCreated = $this->userRepository->create([
            "email" => $email,
            "password" => $password,
            "name" => $name
        ]);

        return $userCreated;
    }
}

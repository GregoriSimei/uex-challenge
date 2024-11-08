<?php

namespace App\Http\Controllers;

use App\Services\User\CreateUserService\CreateUserService;
use App\Services\User\CreateUserService\CreateUserServiceRequestDTO;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $createUserService;

    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'name' => ['required', 'string']
        ]);

        $serviceRequest = new CreateUserServiceRequestDTO(
            $validatedData['email'],
            $validatedData['name'],
            $validatedData['password']
        );

        $resp = $this->createUserService->execute($serviceRequest);
        
        return response()->json($resp, 201);
    }
}

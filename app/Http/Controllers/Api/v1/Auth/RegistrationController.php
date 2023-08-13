<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Contracts\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use Illuminate\Http\Response;

class RegistrationController extends Controller
{
    public function __invoke(
        RegistrationRequest $request,
        UserRepository $userRepository,
    ): Response {

        $user = $userRepository->create($request->all());

        return response([
            'token' => 'Bearer ' . $user->createToken('sanctum')->plainTextToken,
        ], 200);
    }
}

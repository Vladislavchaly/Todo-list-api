<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Contracts\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, UserRepository $userRepository): JsonResponse
    {
        if (auth()->attempt($request->all())) {
            $user = $userRepository->getByEmail($request['email']);

            return response()->json([
                'token' => 'Bearer ' . $user->createToken('sanctum')->plainTextToken,
            ], 200);
        }

        return response()->json(__('auth.failed'), 422);
    }
}

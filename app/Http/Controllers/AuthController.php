<?php

    namespace App\Http\Controllers;

    use App\Models\Client;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\ValidationException;

    class AuthController extends Controller
    {
        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $client = Client::where('email', $request->email)->first();

            $user = User::where('email', $request->email)->first();

            if ($client) {
                if (Hash::check($request->password, $client->password)) {
                    $token = $client->createToken($client->name)->accessToken;
                    $client->update(['api_token' => $token->token]);
                    $response = ['token' => $token, '1a47feed85ead3706dad9d5f1724c31e' => '62608e08adc29a8d6dbc9754e659f125'];
                    return response($response, 200);
                } else {
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }
            }
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken($user->name)->accessToken;
                    $user->update(['api_token' => $token->token]);
                    $response = ['token' => $token, '1a47feed85ead3706dad9d5f1724c31e' => '21232f297a57a5a743894a0e4a801fc3'];
                    return response($response, 200);
                } else {
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }
            }

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        public function logout(Request $request)
        {
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
            return response($response, 200);
        }
    }

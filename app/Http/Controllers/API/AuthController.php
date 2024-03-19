<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'error' => false,
                'message' => $validator->errors()->all(),
                'status' => false,
            ];
            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User registered successfully'
        ];

        return response()->json($response, 200);
    }


    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => 'Unauthorized'
            ];

            return response()->json($response, 401);
        }
    }


    public function get_user($id)
    {

        $user = User::find($id);

        if ($user) {
            return  response()->json(['status' => 200, 'data' => $user, 'message' => "show list of data"]);
        } else {
            return response()->json(['status' => 400, 'data' => [], 'message' => "Please login"]);
        }
    }
 
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            $response = [
                'error' => false,
                'message' => $validator->errors()->all(),
            ];
            return response()->json($response, 400);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'message' => "user update successfull",
            'status' => true,
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        if ($validator->fails()) {
            $response = [
                'error' => false,
                'message' => 'image uplord not found',
            ];
            return response()->json($response, 400);
        }
        $image = $request->image;
        $imgg = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $imgg;
        $image = $image->move(public_path() . '/image/', $imageName);

        return response()->json([
            'status' => true,
            'message' => 'image uplord successfull',
        ]);
    }
    
}

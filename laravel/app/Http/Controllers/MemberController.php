<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResCollection;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{

    public function index()
    {
        $contents = 'Hello, this is a test file!';
        dd(Storage::disk('s3')->put('/text.txt', $contents));    
    }


    public function LoginAction(Request $request)
    {
        if (!Auth::guard('members')->attempt($request->only(['email', 'password']))) {
            throw new AuthenticationException();
        }

        $request->session()->regenerate();

        return new ResCollection(User::AuthMember());
    }

    public function LogoutAction(Request $request)
    {
        Auth::guard('members')->logout();
        $request->session()->invalidate();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

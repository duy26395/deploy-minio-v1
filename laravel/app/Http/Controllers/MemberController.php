<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{

    public function index()
    {
        $contents = 'Hello, this is a test file!';
        dd(Storage::disk('s3')->put('text.txt', 'ahihi'));    
    }
}

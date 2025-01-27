<?php

namespace App\Http\Controllers\UserBackend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        return view('dashboard');
    }
}

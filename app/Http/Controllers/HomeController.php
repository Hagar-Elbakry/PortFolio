<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
        $user =  User::where('name', 'Hagar Elbakry')->first();
        return view('home', compact('user'));
    }
}

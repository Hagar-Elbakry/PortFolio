<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
        $user =  User::where('is_portfolio_owner', true)->firstOrFail();
        return view('home', compact('user'));
    }
}

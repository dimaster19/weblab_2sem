<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Форма регистрации
     */
    public function register() {
        return view('signup');
    }

    /**
     * Добавление пользователя
     */
    public function create(Request $request) {
        Log::debug($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('signin')
            ->with('success', 'Вы успешно зарегистрировались');
    }
}

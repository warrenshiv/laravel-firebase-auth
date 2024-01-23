<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Auth;
use Illuminate\Http\Request;

class FirebaseAuthController extends Controller
{
    public function login(Request $request, Auth $auth)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $user = $auth->signInWithEmailAndPassword($email, $password);
            // User authenticated successfully
        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            // Invalid password
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            // User not found
        }
    }
}

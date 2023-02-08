<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\Auth\AuthService;
use Illuminate\Http\Request;

/**
 * 
 * @author khanghuynh
 */

class AuthController extends Controller
{
    private $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * Xử lý đăng ký user
     */
    public function signUp()
    {
        return $this->service->doSignUp();
    }


    /**
     * Xử lý đăng nhập user
     */
    public function signIn()
    {
        return $this->service->doSignIn();
    }


    /**
     * Xử lý đăng xuất user
     */
    public function signOut()
    {
        return $this->service->doSignOut();
    }
}

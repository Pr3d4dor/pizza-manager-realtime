<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 * Esse controller é responsável por autenticar os usuários
 */
class LoginController extends Controller
{
    // Essa trait padrão do Laravel AuthenticatesUsers que realiza a autenticação dos usuários
    use AuthenticatesUsers;

    /**
     * Rota para redirecionar após o login
     * @var string
     */
    protected $redirectTo = '/orders';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

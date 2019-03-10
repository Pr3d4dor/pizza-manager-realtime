<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Auth
 * Esse controller é responsável pelo reset de senha dos usuários
 */
class ResetPasswordController extends Controller
{
    // Essa trait padrão do Laravel ResetsPasswords que realiza o reset de senha dos usuários
    use ResetsPasswords;

    /**
     * Rota para redirecionar após o reset
     * @var string
     */
    protected $redirectTo = '/orders';

    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

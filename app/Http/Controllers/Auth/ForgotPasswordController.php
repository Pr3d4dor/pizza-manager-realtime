<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class ForgotPasswordController
 * @package App\Http\Controllers\Auth
 * Esse controller é responsável por enviar o e-mail de reset de senha
 */
class ForgotPasswordController extends Controller
{
    // Essa trait padrão do Laravel SendsPasswordResetEmails que realiza o envio dos emails
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

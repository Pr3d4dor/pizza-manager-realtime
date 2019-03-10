<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Class Handler
 * @package App\Exceptions
 * Classe padrão do Laravel que realiza o processamento de Exceptions
 */
class Handler extends ExceptionHandler
{
    /**
     * Exceptions ignoradas
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * Lista de inputs que erros não devem ser exibidos
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Função para reportar a ocorrência de uma Exception
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Função para renderizar uma Exception no formato HTTP
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}

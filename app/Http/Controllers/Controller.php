<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class Controller
 * @package App\Http\Controllers
 * Controller base do Laravel
 */
class Controller extends BaseController
{
    // Trais padrão do Laravel par autorizar requisições, validar e criar jobs (trabalhos em background)
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

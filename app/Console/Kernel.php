<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel
 * @package App\Console
 * Classe padrão do Kernel do Laravel
 */
class Kernel extends ConsoleKernel
{
    /**
     * Commandos de console personalizados
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Commandos configurados para serem executados em uma data/hora específica
     * @param Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }

    /**
     * Registro dos comandos personalizados
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

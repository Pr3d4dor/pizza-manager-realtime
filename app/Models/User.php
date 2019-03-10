<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * Model de Usuário
 */
class User extends Authenticatable
{
    // Trait padrão do Laravel que implica que esse model recebe notificações
    use Notifiable;

    /**
     * Atributos que podem ser preenchidos
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Atributos que devem ficar escondidos
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

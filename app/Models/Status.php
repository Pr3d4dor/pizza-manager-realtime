<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App\Models
 * Model de status
 */
class Status extends Model
{
    /**
     * Atributos que podem ser preenchidos
     * @var array
     */
    protected $fillable = ['name', 'percent'];
}

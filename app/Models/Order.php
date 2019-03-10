<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * Model de pedidos (order)
 */
class Order extends Model
{
    /**
     * Atributos que podem ser preenchidos
     * @var array
     */
    protected $fillable = ['user_id', 'address', 'size', 'toppings', 'instructions', 'status_id'];

    /**
     * Cliente que realizou o pedido
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Status do pedido
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;

/**
 * Class OrderStatusChangedListener
 * @package App\Listeners
 * Listener do evento de mudança de status de pedido (order)
 * Pode ser considerado como o design pattern Observer
 */
class OrderStatusChangedListener
{
    /**
     * OrderStatusChangedListener constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Função que será executada toda vez que o evento de mudança de status de pedido for executado
     * @param OrderStatusChanged $event
     */
    public function handle(OrderStatusChanged $event)
    {
        //
    }
}

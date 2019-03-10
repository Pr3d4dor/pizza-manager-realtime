<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class OrderStatusChanged
 * @package App\Events
 * Evento personalizado que é disparado quando um pedido (order) muda de status
 * A interface ShouldBroadcast padrão do Laravel diz que o evento será notificado para os usuários
 */
class OrderStatusChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Pedido (order) que mudou de status
     * @var Order
     */
    public $order;

    /**
     * OrderStatusChanged constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Canais em qual o evento será enviado
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['private-pizza-tracker.'.$this->order->id, 'pizza-tracker'];
    }

    /**
     * Dados a serem enviados no canal
     *
     * @return array
     */
    public function broadcastWith()
    {
        $extra = [
            'status_name' => $this->order->status->name,
            'status_percent' => $this->order->status->percent,
        ];

        return array_merge($this->order->toArray(), $extra);
    }
}

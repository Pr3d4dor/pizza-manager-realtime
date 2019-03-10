<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;

/**
 * Class OrderBuilderSingleton
 * @package App\Services
 * Classe que representa um construtor de pedidos (order)
 * Monta o pedido por partes
 * Para evitar a instância de múltiplos builders também é utilizado o design pattern Singleton
 * Design Pattern: Builder
 * Design Pattern: Singleton
 */
class OrderBuilderSingleton
{
    /**
     * Pedido (order) que está sendo criado
     * @var Order
     */
    private $order;

    /**
     * Instancia única da classe
     * @var OrderBuilderSingleton
     */
    private static $instance;

    /**
     * Função que retorna a instância única do builder
     * Caso não exista instância, ela será criada
     * Caso ela já exista a mesma sera retornada
     * @return OrderBuilderSingleton
     */
    public static function getInstance(): OrderBuilderSingleton
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Seta o usuário que realizou o pedido (order)
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->order->user_id = $user->id;
    }

    /**
     * Seta o endereço do pedido (order)
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->order->address = $address;
    }

    /**
     * Seta o tamanho do pedido (order)
     * @param string $size
     */
    public function setSize(string $size)
    {
        $this->order->size = $size;
    }

    /**
     * Adiciona cobertura do pedido (order)
     * @param string $topping
     */
    public function addTopping(string $topping)
    {
        $toppings = $this->order->toppings;

        if ($toppings) {
            /** @var array $toppings */
            $toppings = explode(', ', $this->order->toppings);
        } else {
            $toppings = [];
        }

        array_push($toppings, $topping);

        $this->order->toppings = implode(', ', $toppings);
    }

    /**
     * Seta as instruções do pedido (order)
     * @param string $instructions
     */
    public function setInstructions(string $instructions)
    {
        $this->order->instructions = $instructions;
    }

    /**
     * Cria um pedido com status inicial "Pedido criado"
     */
    public function createOrder()
    {
        $this->order = new Order([
            'status_id' => 1
        ]);
    }

    /**
     * Retorna o pedido (order) após o mesmo terminar se ser criado
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Construtor privado para não permitir a criação de múltiplas instâncias
     * OrderBuilderSingleton constructor.
     */
    private function __construct()
    {
    }

    /**
     * Não permitir o clone para não existirem múltiplas instâncias
     */
    private function __clone()
    {
    }

    /**
     * Não permitir a deserialização para não existirem múltiplas instâncias
     */
    private function __wakeup()
    {
    }
}

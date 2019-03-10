<?php

namespace App\Services;

use App\Models\Order;

/**
 * Class OrderFactory
 * @package App\Services
 * Classe que representa uma Fábrica de pedidos (order)
 * Design Pattern: Simple Factory
 * Utiliza por baixo dos panos outra classe OrderBuilderSingleton
 */
class OrderFactory
{
    /**
     * @param array $parameters
     * @return Order
     */
    public function createOrder(array $parameters)
    {
        /** @var $orderBuilderSingleton */
        $orderBuilderSingleton =  OrderBuilderSingleton::getInstance();

        $orderBuilderSingleton->createOrder();

        $orderBuilderSingleton->setUser($parameters['user']);
        $orderBuilderSingleton->setAddress($parameters['address']);
        $orderBuilderSingleton->setInstructions($parameters['instructions']);
        $orderBuilderSingleton->setSize($parameters['size']);

        foreach ($parameters['toppings'] as $topping) {
            $orderBuilderSingleton->addTopping($topping);
        }

        $order = $orderBuilderSingleton->getOrder();
        $order->save();

        return $order;
    }
}
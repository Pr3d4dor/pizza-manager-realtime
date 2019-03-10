<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Events\OrderStatusChanged;

/**
 * Class AdminOrdersController
 * @package App\Http\Controllers
 * Controller responsável pelas funcionalidades do admin sobre os pedidos (orders)
 */
class AdminOrdersController extends Controller
{
    /**
     * Retorna a view com a listagem de pedidos de todos os usuários
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with(['customer', 'status'])->get();

        return view('admin.index', compact('orders'));
    }

    /**
     * Retorna a view com o detalhamento de um pedido específico
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('show', compact('order'));
    }

    /**
     * Retorna a view com o formulário para a edição do status de um pedido específico
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order)
    {
        $statuses = Status::all();
        $currentStatus = $order->status_id;

        return view('admin.edit', compact('order', 'statuses', 'currentStatus'));
    }

    /**
     * Função para atualizar os dados de um pedido (rota para qual o formulário da função edit aponta)
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status_id' => 'required|numeric',
        ]);

        $order->status_id = $request->status_id;
        $order->save();

        event(new OrderStatusChanged($order));

        return back()->with('message', 'Status de Pedido atualizado com sucesso!');
    }
}

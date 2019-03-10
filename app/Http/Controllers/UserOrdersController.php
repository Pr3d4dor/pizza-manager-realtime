<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderFactory;
use Illuminate\Http\Request;

/**
 * Class UserOrdersController
 * Controller responsável pelas funcionalidades do usuário normal sobre os pedidos (orders)
 * @package App\Http\Controllers
 */
class UserOrdersController extends Controller
{
    /**
     * Utilizando o design patter Simple Factory
     * O order factory serve para criar pedidos
     * @var OrderFactory
     */
    private $orderFactory;

    /**
     * UserOrdersController constructor.
     */
    public function __construct()
    {
        $this->orderFactory = new OrderFactory();
    }

    /**
     * Retorna a view com a listagem de pedidos do usuário logado
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $orders = Order::with('status')->where('user_id', $user->id)->get();

        return view('index', compact('user', 'orders'));
    }

    /**
     * Retorna a view com o formulário de criação de pedido
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Função para salvar um pedido no banco de dados utilizando o order factory e para qual o formulário
     * da view create aponta
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'size' => 'required',
        ]);

        $order = $this->orderFactory->createOrder([
            'user' => $request->user(),
            'address' => $request->address,
            'size' => $request->size,
            'toppings' => $request->toppings,
            'instructions' => $request->instructions,
        ]);

        return redirect()->route('user.orders.show', $order)->with('message', 'Pedido recebido!');
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
}

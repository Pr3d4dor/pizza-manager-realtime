@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pedir Pizza</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <order-alert user_id="{{ auth()->user()->id }}"></order-alert>

                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="{{ route('user.orders.store') }}" class="form-horizontal">
                                {{ csrf_field() }}

                                <div class="form-group"><label class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-10"><input type="text" name="address" placeholder="Seu Endereço" class="form-control"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Tamanho</label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" checked="" value="média" id="média" name="size"> Média </label></div>
                                        <div><label> <input type="radio" value="grande" id="grande" name="size"> Grande </label></div>
                                        <div><label> <input type="radio" value="extra-grande" id="extra-grande" name="size"> Extra Grande </label></div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Coberturas</label>
                                    <div class="col-sm-10">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="toppings[]" value="pepperoni" id="pepperoni"> Pepperoni
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="toppings[]" value="extra-cheese" id="extra-cheese"> Extra Queijo
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="toppings[]" value="mushrooms" id="mushrooms"> Cogumelos
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="toppings[]" value="ground-beef" id="barbecue"> Barbecue
                                        </label>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Instruções</label>
                                    <div class="col-sm-10"><input type="text" name="instructions" placeholder="Instruções especiais aqui" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-success" type="submit">Pedir Agora</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

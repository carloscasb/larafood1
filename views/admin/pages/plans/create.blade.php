@extends('adminlte::page')

@section('title', 'Cadastrando Novo Planos')

@section('content_header')
<h1>Cadastrando Novo Planos  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('plans.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')
<div class=form-group>
    <label>NOME</label>
<input class="form-control" type="text" name="name" placeholder="name" value=" {{$plan->name ?? old('name')}} ">
</div>
<div class=form-group>
<label>PREÇO</label>
<input type="text" class="form-control" name="price" placeholder="price" value=" {{$plan->price ?? old('price')}} ">
</div> 
<div class=form-group>
<label>DESCRIÇÃO</label>
<input type="text" class="form-control" name="description" placeholder="description" value="{{$plan->description ?? old('description')}} ">
</div>
<div class=form-group>
<button type="submit" class="btn btn-success">Enviar</button>
</div>
</form>

            </div>
            </div>


@endsection            
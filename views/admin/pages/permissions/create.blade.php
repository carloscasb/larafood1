@extends('adminlte::page')

@section('title', 'Cadastrando Novo Perfil')

@section('content_header')
<h1>Cadastrando Novo Perfil  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('permissions.store')}}" class="form" method="POST" >
@csrf
@include('admin.includes.alerts')
<div class=form-group>
    <label>NOME</label>
<input class="form-control" type="text" name="name" placeholder="name" value=" {{$permission->name ?? old('name')}} ">
</div>
<div class=form-group>
<label>DESCRIÇÃO</label>
<input type="text" class="form-control" name="description" placeholder="description" value="{{$permission->description ?? old('description')}} ">
</div>
<div class=form-group>
<button type="submit" class="btn btn-success">Enviar</button>
</div>
</form>

            </div>
            </div>


@endsection    
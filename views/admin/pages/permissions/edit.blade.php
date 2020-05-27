@extends('adminlte::page')

@section('title', "EDITANDO A PERMISÃO {$permission->name}")

@section('content_header')
<h1>EDITANDO PERMISÃO {{$permission->name}}  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('permissions.update', $permission->id)}}" class="form" method="POST" >
@csrf
@method('PUT')


<div class=form-group>
    <label>NOME</label>
<input class="form-control" type="text" name="name" placeholder="name" value="{{$permission->name}}">
</div>
<div class=form-group>
<label>DESCRIÇÃO</label>
<input type="text" class="form-control" name="description" placeholder="description" value="{{$permission->description}}">
</div>
<div class=form-group>
<button type="submit" class="btn btn-success">Enviar</button>
</div>
</form>

            </div>
            </div>


@endsection        
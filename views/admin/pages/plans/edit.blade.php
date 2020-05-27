@extends('adminlte::page')

@section('title', "EDITANDO Planos {$plan->name}")

@section('content_header')
<h1>EDITANDO Planos {{$plan->name}}  </h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-body">
            <form action="{{route('plans.update', $plan->url)}}" class="form" method="POST" >
@csrf
@method('PUT')


<div class=form-group>
    <label>NOME</label>
<input class="form-control" type="text" name="name" placeholder="name" value="{{$plan->name}}">
</div>
<div class=form-group>
<label>PREÇO</label>
<input type="text" class="form-control" name="price" placeholder="price" value="{{$plan->price}}">
</div>
<div class=form-group>
<label>DESCRIÇÃO</label>
<input type="text" class="form-control" name="description" placeholder="description" value="{{$plan->description}}">
</div>
<div class=form-group>
<button type="submit" class="btn btn-success">Enviar</button>
</div>
</form>

            </div>
            </div>


@endsection            
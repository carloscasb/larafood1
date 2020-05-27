@extends('adminlte::page')

@section('title', "Detalhes do Planos {$detail->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('plans.index')}}" >Planos</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('plans.show', $plan->url)}}" >{{$plan->name}}</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('details.plans.index', $plan->url)}}" class="active">Detalhes</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('details.plans.edit', [$plan->url, $detail->id])}}" class="active">Detalhes</a></li>
</ol>
</nav>

<h1> DETALHE DO PLANOS {{$detail->name}} </h1>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">
       <ul>
       <li>
           <strong>NOME</strong>{{$detail->name}}
        </li>
       </ul> 
       
       </div>
           <div class="car-footer">
            <form action="{{route('details.plans.destroy', [$plan->url, $detail->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar o Detalhe do {{$detail->name}} do {{$plan->name}} </button>
            </form>

           </div>

       </div>
@endsection
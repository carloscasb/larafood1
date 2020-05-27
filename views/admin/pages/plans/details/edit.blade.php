@extends('adminlte::page')

@section('title', "Editar Detalhes do Planos {$detail->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('plans.index')}}" >Planos</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('plans.show', $plan->url)}}" >{{$plan->name}}</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('details.plans.index', $plan->url)}}" class="active">Detalhes</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('details.plans.edit', [$plan->url, $detail->id])}}" class="active">Edit</a></li>
</ol>
</nav>

<h1>ADICIONAR NOVO DETALHE DO PLANOS {{$detail->name}} </h1>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">
        
        <form action=" {{ route('details.plans.update', [$plan->url, $detail->id])}}" method="POST">
        @method('PUT')
        @include('admin.pages.plans.details.partials.form')

        </form>

       </div>
       </div>
       @endsection
@extends('adminlte::page')

@section('title', "Detalhes do Planos {$plan->name}")

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('plans.index')}}" >Planos</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('plans.show', $plan->url)}}" >{{$plan->name}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('details.plans.index', $plan->url)}}" class="active">Detalhes</a></li>
  </ol>
</nav>

<h1>DETALHE DO PLANOS {{$plan->name}} <a href="{{route('details.plans.create', $plan->url)}}" class="btn btn-dark">ADD<i class="far fa-plus-square"></i></a></h1>

@stop

@section('content')
   
            <div class="card">
            
        <div class="card-body">

        @include ('admin\includes\alerts')

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width: 50px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($details as $detail)
                 <tr>
                    <td>{{ $detail->name }}</td>
                    
                    <td style="width: 250px;">
                    <a href="{{ route('details.plans.edit', [$plan->url, $detail->id]) }}" class="btn btn-warning">EDITAR</a>
                    <a href="{{ route('details.plans.show', [$plan->url, $detail->id]) }}" class="btn btn-warning">VER</a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>

            <div class="card-footer">

                @if (isset ($filters)) 
                {!! $details->appends($filters)->links() !!}
                @else
                 {!! $details->links() !!}
                @endif

               
            </div>

@stop
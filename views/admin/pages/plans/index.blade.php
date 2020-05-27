@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('plans.index')}}" class="active">Planos</a></li>
  </ol>
</nav>

<h1>PLANOS  <a href="{{route('plans.create')}}" class="btn btn-dark">ADD<i class="far fa-plus-square"></i></a></h1>

@stop

@section('content')
   
            <div class="card">
            <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="Filter" placeholder="NOME" class="form-control" value="{{ $filters ['filter']  ?? ''}}" >
        <button type="submit" class="btn btn-dark">PESQUISAR</button>
        </form>

                </div>
        <div class="card-body">

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:300px">Preço</th>
                     <th style="width:300px">Ação</th>

                </tr>

            </thead>
            <body>
                @foreach($plans as $plan)
                 <tr>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->price }}</td>
                    <td style="width: 250px;">
                    <a href="{{ route('details.plans.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                    <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                    <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning" title="Perfils Associados"><i class=" fas fa-address-book"></i></a>
                    </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>

            <div class="card-footer">

                @if (isset ($filters)) 
                {!! $plans->appends($filters)->links() !!}
                @else
                 {!! $plans->links() !!}
                @endif

               
            </div>

@stop
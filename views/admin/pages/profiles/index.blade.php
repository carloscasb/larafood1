@extends('adminlte::page')

@section('title', 'perfis')

@section('content_header')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}} ">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('profiles.index')}}" >Perfis</a></li>
     </ol>
</nav>

<h1>Perfis <a href="{{route('profiles.create')}}" class="btn btn-dark"><i class="far fa-plus-square"></i></a></h1>

@stop

@section('content')
   
<div class="card">
            <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
                </div>
            
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
                @foreach($profiles as $profile)
                 <tr>
                    <td>{{ $profile->name }}</td>
                    
                    <td style="width: 250px;">
                    <a href="{{ route('profiles.edit',  $profile->id) }}" class="btn btn-warning">EDITAR</a>
                    <a href="{{ route('profiles.show',  $profile->id) }}" class="btn btn-warning">VER</a>
                    <a href="{{ route('profiles.permissions',  $profile->id) }}" class="btn btn-warning" title="Permisões assocadas"><i class="fas fa-unlock-alt"></i></a>
                    <a href="{{ route('profiles.plans',  $profile->id) }}" class="btn btn-warning" title="Planos assocadas"><i class="fas fa-list-ol"></i></a>
                </td>
                    </tr>
                @endforeach
            </body>
        </table>
       
    
                </div>
            </div>

            <div class="card-footer">

                @if (isset ($filters)) 
                {!! $profiles->appends($filters)->links() !!}
                @else
                 {!! $profiles->links() !!}
                @endif

               
            </div>

@stop
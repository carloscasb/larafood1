@extends('adminlte::page')

@section('title', "DETALHE DA PERMISSÂO  {$permission->name} ")

@section('content_header')
<h1>Detalhe do PERMISSÂO <b>{{ $permission->name }}</b>  </h1>

@stop

@section('content')

            <div class="card">
            <div class="card-body">
            <ul>
            <li>
            <strong>NOME</strong> {{ $permission->name }}
            </li>
            <li>
            <strong>DESCRIÇÂO</strong> {{ $permission->description }}
            </li>
            
            </ul>
            @include ('admin\includes\alerts')
                <form action=" {{ route('permissions.destroy', $permission->id) }}"  method="POST"  >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>...DELETAR O PERFIL {{ $permission->name }}</button>

                
                </form>

            </div>
            </div>
            @endsection

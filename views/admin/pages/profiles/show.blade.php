@extends('adminlte::page')

@section('title', "DETALHE DO Perfis  {$profile->name} ")

@section('content_header')
<h1>Detalhe do profileO <b>{{ $profile->name }}</b>  </h1>

@stop

@section('content')

            <div class="card">
            <div class="card-body">
            <ul>
            <li>
            <strong>NOME</strong> {{ $profile->name }}
            </li>
            <li>
            <strong>DESCRIÇÂO</strong> {{ $profile->description }}
            </li>
            
            </ul>
            @include ('admin\includes\alerts')
                <form action=" {{ route('profiles.destroy', $profile->id) }}"  method="POST"  >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>DELETAR O PERFIL {{ $profile->name }}</button>

                
                </form>

            </div>
            </div>
            @endsection
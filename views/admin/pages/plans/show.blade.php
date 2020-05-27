@extends('adminlte::page')

@section('title', "DETALHE DO Planos  {$plan->name} ")

@section('content_header')
<h1>Detalhe do PLANO <b>{{ $plan->name }}</b>  </h1>

@stop

@section('content')

            <div class="card">
            <div class="card-body">
            <ul>
            <li>
            <strong>NOME</strong> {{ $plan->name }}
            </li>
            <li>
            <strong>Url</strong> {{ $plan->url }}
            </li>
            <li>
            <strong>PREÇO</strong> R$ {{ $plan->price  }}
            </li>
            <li>
            <strong>DESCRIÇÂO</strong> {{ $plan->description }}
            </li>
            
            </ul>
            @include ('admin\includes\alerts')
                <form action=" {{ route('plans.destroy', $plan->url) }}"  method="POST"  >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>DELETAR O PLANO {{ $plan->name }}</button>

                
                </form>

            </div>
            </div>
            @endsection
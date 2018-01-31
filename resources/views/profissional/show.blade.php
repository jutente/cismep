@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('profissional.index')}}">Profissional</a> - Excluir</div>
                <br>
                <ul class="list-group">
                    <li class="list-group-item">Profissional: {{$profissional->nome }}</li>
                </ul>                
                <br><br>
                {!! Form::open(['method' => 'POST', 'url' => route('profissional.destroy', $profissional->id), 'class' => 'form-horizontal']) !!}

                {{ Form::hidden('_method', 'DELETE') }}

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        {{ Form::submit('Excluir?', ['class' => 'btn btn-danger btn-sm']) }}
                    </div>    
                </div>

                {!! Form::close() !!} 
            </div>

            <a href="{{route('profissional.index')}}" class="btn btn-default btn-sm" role="button">Voltar</a> 
        </div>
    </div>
</div>
@endsection
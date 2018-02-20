@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('edited_competencia')) 
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
                <strong>Info!</strong> {{ session('edited_competencia') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('competencia.index')}}">Competencia</a> - Alterar</div>
                <br>

                {!! Form::open(['method' => 'post', 'url' => route('competencia.update', $competencia->id), 'class' => 'form-horizontal']) !!}

                {{ Form::hidden('_method', 'PUT') }}

                 <!-- ano --> 
                 <div class="form-group {{ $errors->has('ano') ? ' has-error' : '' }}">
                    {{ Form::label('ano', 'Ano competencia:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::number('ano', $competencia->ano, ['class' => 'form-control text-uppercase', 'required']) }}
                        @if ($errors->has('ano'))
                            <span class="help-block">
                                <strong>{{$errors->first('ano')}}</strong>
                            </span>
                        @endif
                    </div> 
                </div> 

                <div class="form-group {{ $errors->has('mes') ? ' has-error' : '' }}">
                        {{ Form::label('mes', 'Mes competencia:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {!! Form::select('mes', ['janeiro'=>'janeiro','fevereiro'=>'fevereiro', 'março'=>'março', 'abril'=>'abril', 'maio'=>'maio', 'junho'=>'junho', 
                                                    'julho'=>'julho', 'agosto'=>'agosto', 'setembro'=>'setembro', 'outubro'=>'outubro', 'novembro'=>'novembro', 
                                                    'dezembro'=>'dezembro'], ['placeholder' => 'Escolha um mes...', 'class' => 'form-control']) !!}
                            @if ($errors->has('mes'))
                                <span class="help-block">
                                    <strong>{{$errors->first('mes')}}</strong>
                                </span>
                            @endif
                        </div> 
                </div>           
                          

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

                {!! Form::close() !!} 
            </div>  
                <a href="{{route('competencia.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
        </div>
    </div>        
</div>
@endsection
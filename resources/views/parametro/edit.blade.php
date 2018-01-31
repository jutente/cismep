@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('edited_parametro')) 
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
                <strong>Info!</strong> {{ session('edited_parametro') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('parametro.index')}}">parametro</a> - Alterar</div>
                <br>

                {!! Form::open(['method' => 'post', 'url' => route('parametro.update', $parametro->id), 'class' => 'form-horizontal']) !!}

                {{ Form::hidden('_method', 'PUT') }}

                 <!-- parametro --> 
                 <div class="form-group {{ $errors->has('descricao') ? ' has-error' : '' }}">
                    {{ Form::label('descricao', 'descricao:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('descricao', $parametro->descricao, ['class' => 'form-control text-uppercase']) }}
                        @if ($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{$errors->first('descricao')}}</strong>
                            </span>
                        @endif
                    </div> 
                </div> 

                <div class="form-group {{ $errors->has('plutil') ? ' has-error' : '' }}">
                        {{ Form::label('plutil', 'Valor plantao util:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::number('plutil',  $parametro->plutil, ['class' => 'form-control','step' => '0.01']) }}
                            @if ($errors->has('plutil'))
                                <span class="help-block">
                                    <strong>{{$errors->first('plutil')}}</strong>
                                </span>
                            @endif
                        </div> 
                </div>           

                <div class="form-group {{ $errors->has('plnaoutil') ? ' has-error' : '' }}">
                        {{ Form::label('plnaoutil', 'Valor plantao nao util:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::number('plnaoutil', $parametro->plnaoutil, ['class' => 'form-control','step' => '0.01']) }}
                            @if ($errors->has('plnaoutil'))
                                <span class="help-block">
                                    <strong>{{$errors->first('plnaoutil')}}</strong>
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
                <a href="{{route('parametro.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
        </div>
    </div>        
</div>
@endsection
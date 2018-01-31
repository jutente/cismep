@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('parametro.index')}}">parametro</a> - Novo Registro</div>
                <br>
                {!! Form::open(['method' => 'post', 'url' => route('parametro.store'), 'class' => 'form-horizontal']) !!}
                
                <!-- parametro --> 
                <div class="form-group {{ $errors->has('descricao') ? ' has-error' : '' }}">
                    {{ Form::label('parametro', 'parametro:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('descricao', '', ['class' => 'form-control text-uppercase']) }}
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
                            {{ Form::number('plutil', '', ['class' => 'form-control','step' => '0.01']) }}
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
                            {{ Form::number('plnaoutil', '', ['class' => 'form-control','step' => '0.01']) }}
                            @if ($errors->has('plnaoutil'))
                                <span class="help-block">
                                    <strong>{{$errors->first('plnaoutil')}}</strong>
                                </span>
                            @endif
                        </div> 
                </div>
                           
                          
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Incluir', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

                {!! Form::close() !!}  

            </div>
            <a href="{{route('parametro.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>  
        </div>
    </div>
</div>
@endsection
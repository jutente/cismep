@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('unidade.index')}}">Unidade</a> - Novo Registro</div>
                <br>
                {!! Form::open(['method' => 'post', 'url' => route('unidade.store'), 'class' => 'form-horizontal']) !!}
                
                <!-- unidade --> 
                <div class="form-group {{ $errors->has('unidade') ? ' has-error' : '' }}">
                    {{ Form::label('unidade', 'unidade:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('unidade', '', ['class' => 'form-control text-uppercase']) }}
                        @if ($errors->has('unidade'))
                            <span class="help-block">
                                <strong>{{$errors->first('unidade')}}</strong>
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
            <a href="{{route('unidade.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>  
        </div>
    </div>
</div>
@endsection
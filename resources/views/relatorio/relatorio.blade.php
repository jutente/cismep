@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('pagamento.index')}}">Pagamentos</a></div>
                <br>
                {!! Form::open(['method' => 'post', 'url' => route('relsetor'), 'class' => 'form-horizontal']) !!}
                                              
                <!-- Selecionar unidade -->
                <div class="form-group  {{ $errors->has('unidade_id') ? ' has-error' : '' }}">
                    {{ Form::label('unidade_id', 'Unidade:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('unidade_id', $unidades, null, ['placeholder' => 'Escolha um unidade...', 'class' => 'form-control']) !!}
                        @if ($errors->has('unidade_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('unidade_id')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>
         
                <!-- Selecionar setor -->
                <div class="form-group  {{ $errors->has('setor_id') ? ' has-error' : '' }}">
                    {{ Form::label('setor_id', 'Setor:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('setor_id', $setors, null, ['placeholder' => 'Escolha um setor...', 'class' => 'form-control']) !!}
                        @if ($errors->has('setor_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('setor_id')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>
                                        
                <!-- Selecionar mes -->
                <div class="form-group  {{ $errors->has('mes') ? ' has-error' : '' }}">
                    {{ Form::label('mes', 'Mes:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('mes', ['01 janeiro'=>'janeiro','02 fevereiro'=>'fevereiro', '03 março'=>'março', '04 abril'=>'abril', '05 maio'=>'maio', 
                                                 '06 junho'=>'junho', '07 julho'=>'julho', '08 agosto'=>'agosto', '09 setembro'=>'setembro', '10 outubro'=>'outubro', 
                                                 '11 novembro'=>'novembro', '12 dezembro'=>'dezembro'], ['placeholder' => 'Escolha um mes...', 'class' => 'form-control']) !!}
                        @if ($errors->has('mes'))
                            <span class="help-block">
                                <strong>{{$errors->first('mes')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>
               
                
                <!-- Selecionar ano -->
                <div class="form-group  {{ $errors->has('ano') ? ' has-error' : '' }}">
                    {{ Form::label('ano', 'Ano:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::selectRange('ano', 2018, 2020, ['placeholder' => 'Escolha um ano...', 'class' => 'form-control']) !!}
                        @if ($errors->has('ano'))
                            <span class="help-block">
                                <strong>{{$errors->first('ano')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>

                                             
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Gerar', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

                {!! Form::close() !!}  

            </div>
            <a href="{{route('pagamento.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>  
        </div>
    </div>
</div>
@endsection
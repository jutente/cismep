@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('edited_pagamento')) 
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
                <strong>Info!</strong> {{ session('edited_pagamento') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('pagamento.index')}}">Pagamento</a> - Alterar</div>
                <br>

                {!! Form::open(['method' => 'post', 'url' => route('pagamento.update', $pagamento->id), 'class' => 'form-horizontal']) !!}

                {{ Form::hidden('_method', 'PUT') }}

                <!-- Selecionar Profissional -->
                <div class="form-group  {{ $errors->has('profissional_id') ? ' has-error' : '' }}">
                    {{ Form::label('profissional_id', 'Profissional:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('profissional_id', $profissionals, $pagamento->profissional_id , ['placeholder' => 'Escolha um profissional...', 'class' => 'form-control']) !!}
                        @if ($errors->has('profissional_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('profissional_id')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>
                
                <!-- Selecionar unidade -->
                <div class="form-group  {{ $errors->has('unidade_id') ? ' has-error' : '' }}">
                    {{ Form::label('unidade_id', 'Unidade:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('unidade_id', $unidades, $pagamento->unidade_id, ['placeholder' => 'Escolha um unidade...', 'class' => 'form-control']) !!}
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
                        {!! Form::select('setor_id', $setors, $pagamento->setor_id, ['placeholder' => 'Escolha um setor...', 'class' => 'form-control']) !!}
                        @if ($errors->has('setor_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('setor_id')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>

                <!-- Selecionar parametro -->
                <div class="form-group  {{ $errors->has('parametro_id') ? ' has-error' : '' }}">
                    {{ Form::label('parametro_id', 'Serviço:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('parametro_id', $parametros, $pagamento->parametro_id, ['placeholder' => 'Escolha um serviço...', 'class' => 'form-control']) !!}
                        @if ($errors->has('parametro_id'))
                            <span class="help-block">
                                <strong>{{$errors->first('parametro_id')}}</strong>
                            </span>
                        @endif
                        </div>    
                </div>


                <!--  numplutil -->
                <div class="form-group {{ $errors->has('numplutil') ? ' has-error' : '' }}">
                    {{ Form::label('numplutil', 'Plantoes uteis (em horas):', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::number('numplutil', $pagamento->numplutil, ['class' => 'form-control']) }}
                        @if ($errors->has('numplutil'))
                            <span class="help-block">
                                <strong>{{$errors->first('numplutil')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!--  numplnaoutil  -->
                <div class="form-group {{ $errors->has('numplnaoutil') ? ' has-error' : '' }}">
                    {{ Form::label('numplnaoutil', 'Plantoes nao uteis (em horas):', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('numplnaoutil', $pagamento->numplnaoutil, ['class' => 'form-control']) }}
                        @if ($errors->has('numplnaoutil'))
                            <span class="help-block">
                                <strong>{{$errors->first('numplnaoutil')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!-- Data do Pagamento -->
                <div class="form-group {{ $errors->has('dtpagamento') ? ' has-error' : '' }}">
                    {{ Form::label('dtpagamento', 'Data do Pagamento:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::date('dtpagamento', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        @if ($errors->has('dtpagamento'))
                            <span class="help-block">
                                <strong>{{$errors->first('dtpagamento')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <div class="form-group {{ $errors->has('ano') ? ' has-error' : '' }}">
                    {{ Form::label('ano', 'Ano de referencia:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('ano', $competencias->ano, ['class' => 'form-control','readonly']) }}
                        @if ($errors->has('ano'))
                            <span class="help-block">
                                <strong>{{$errors->first('ano')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!-- mes do pagamento -->
                <div class="form-group {{ $errors->has('mes') ? ' has-error' : '' }}">
                    {{ Form::label('mes', 'Mes de referencia:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('mes', $competencias->mes, ['class' => 'form-control','readonly']) }}
                        @if ($errors->has('mes'))
                            <span class="help-block">
                                <strong>{{$errors->first('ano')}}</strong>
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
                <a href="{{route('profissional.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>
        </div>
    </div>        
</div>
@endsection
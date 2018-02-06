@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('pagamento.index')}}">pagamento</a> - Novo</div>
                <br>
                {!! Form::open(['method' => 'post', 'url' => route('pagamento.store'), 'class' => 'form-horizontal']) !!}
                
                <!-- Selecionar Profissional -->
                <div class="form-group  {{ $errors->has('profissional_id') ? ' has-error' : '' }}">
                    {{ Form::label('profissional_id', 'Profissional:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('profissional_id', $profissionals, null, ['placeholder' => 'Escolha um profissional...', 'class' => 'form-control']) !!}
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

                <!-- Selecionar parametro -->
                <div class="form-group  {{ $errors->has('parametro_id') ? ' has-error' : '' }}">
                    {{ Form::label('parametro_id', 'Serviço:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        {!! Form::select('parametro_id', $parametros, null, ['placeholder' => 'Escolha um serviço...', 'class' => 'form-control']) !!}
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
                        {{ Form::number('numplutil', '', ['class' => 'form-control']) }}
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
                        {{ Form::text('numplnaoutil', '', ['class' => 'form-control']) }}
                        @if ($errors->has('numplnaoutil'))
                            <span class="help-block">
                                <strong>{{$errors->first('numplnaoutil')}}</strong>
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
            <a href="{{route('pagamento.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>  
        </div>
    </div>
</div>
@endsection
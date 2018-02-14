@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('pagamento.index')}}">pagamento</a> - Novo</div>
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

                 <!--  mesano  -->
                 <div class="form-group {{ $errors->has('mesano') ? ' has-error' : '' }}">
                    {{ Form::label('mesano', 'Mes e ano:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('mesano', '', ['class' => 'form-control', 'placeholder'=>'Exemplo Janeiro/2018']) }}
                        @if ($errors->has('mesano'))
                            <span class="help-block">
                                <strong>{{$errors->first('mesano')}}</strong>
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
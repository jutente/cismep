@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('profissional.index')}}">profissional</a> - Novo Registro</div>
                <br>
                {!! Form::open(['method' => 'post', 'url' => route('profissional.store'), 'class' => 'form-horizontal']) !!}
                
                <!-- profissional --> 
                <div class="form-group {{ $errors->has('nome') ? ' has-error' : '' }}">
                    {{ Form::label('nome', 'Profissional:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('nome', '', ['class' => 'form-control text-uppercase']) }}
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{$errors->first('nome')}}</strong>
                            </span>
                        @endif
                    </div> 
                </div>
                  
                  <!-- cargo -->
                  <div class="form-group {{ $errors->has('cargo') ? ' has-error' : '' }}">   
                    {{ Form::label('cargo', 'Cargo:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('cargo', '', ['class' => 'form-control']) }}
                        @if ($errors->has('cargo'))
                            <span class="help-block">
                                <strong>{{$errors->first('cargo')}}</strong>
                            </span>
                        @endif
                    </div>       
                </div>

                <!--  especialidade -->
                <div class="form-group {{ $errors->has('especialidade') ? ' has-error' : '' }}">
                    {{ Form::label('especialidade', 'Especialidade:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('especialidade', '', ['class' => 'form-control']) }}
                        @if ($errors->has('especialidade'))
                            <span class="help-block">
                                <strong>{{$errors->first('especialidade')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!--  cpf -->
                <div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}">
                    {{ Form::label('cpf', 'CPF:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('cpf', '', ['class' => 'form-control']) }}
                        @if ($errors->has('cpf'))
                            <span class="help-block">
                                <strong>{{$errors->first('cpf')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!--  registro  -->
                <div class="form-group {{ $errors->has('registro') ? ' has-error' : '' }}">
                    {{ Form::label('registro', 'Registro profissional:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::text('registro', '', ['class' => 'form-control']) }}
                        @if ($errors->has('registro'))
                            <span class="help-block">
                                <strong>{{$errors->first('registro')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!--  telefone -->
                <div class="form-group {{ $errors->has('tel') ? ' has-error' : '' }}">
                    {{ Form::label('tel', 'Telefone:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::tel('tel', '', ['class' => 'form-control','maxlength'=>'11']) }}
                        @if ($errors->has('tel'))
                            <span class="help-block">
                                <strong>{{$errors->first('tel')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!--  celular  -->
                <div class="form-group {{ $errors->has('cel') ? ' has-error' : '' }}">
                    {{ Form::label('cel', 'Celular:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::tel('cel', '', ['class' => 'form-control','maxlength'=>'11']) }}
                        @if ($errors->has('cel'))
                            <span class="help-block">
                                <strong>{{$errors->first('cel')}}</strong>
                            </span>
                        @endif
                    </div>    
                </div>

                <!-- Data do Cadastro -->
                <div class="form-group {{ $errors->has('dtcadastro') ? ' has-error' : '' }}">
                    {{ Form::label('dtcadastro', 'Data do Cadastro:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::date('dtcadastro', \Carbon\Carbon::now(), ['class' => 'form-control', 'readonly']) }}
                        @if ($errors->has('dtcadastro'))
                            <span class="help-block">
                                <strong>{{$errors->first('dtcadastro')}}</strong>
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
            <a href="{{route('profissional.index')}}" class="btn btn-default btn-sm" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Voltar</a>  
        </div>
    </div>
</div>
@endsection
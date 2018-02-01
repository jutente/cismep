@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
	        @if(Session::has('deleted_pagamento')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('deleted_pagamento') }}
	        </div>
	        @endif
	        @if(Session::has('create_pagamento')) 
	        <div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('create_pagamento') }}
	        </div>
	        @endif
	        <div class="panel panel-default">
	            <div class="panel-heading">
					<div class="row">
					  <div class="col-sm-4">
					  	Profissionais
					  </div>
					  <div class="col-sm-12 text-right">
					  	<div class="btn-group btn-group-sm">					  		
							<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalFilter">Filtro</a>
						 					  			
							<a href="{{route('pagamento.create')}}" class="btn btn-primary">Novo Registro</a>							
							  
					  	</div>					  	
					  </div>
					</div>
				</div>	
				<br>
	
				<br>
	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                    <tr>
							<th>Nome</th>
							<th>Unidade</th>
							<th>Setor</th>
							<th>Plantao util</th>
							<th>Valor plantao util</th>
	                        <th>Plantao nao util</th>	
							<th>Valor plantao nao util</th>							
	                        <th></th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    @foreach($pagamentos as $pagamento)
	                    <tr>
	                        <td>{{$pagamento->profissional->nome}}</td>
	                        <td>{{$pagamento->unidade->unidade}}</td>
	                        <td>{{$pagamento->setor->setor}}</td>
							<td>{{$pagamento->numplutil}}</td>
							<td>{{$pagamento->valplutil}}</td>
							<td>{{$pagamento->numplnaoutil}}</td>							
							<td>{{$pagamento->valplnaoutil}}</td>						                        
						
							
	                        <td style="text-align: right">
	                            <a href="{{route('pagamento.edit', $pagamento->idpagamento)}}" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-pencil"></span>Alterar</a>
	                        
	                            <a href="{{route('pagamento.show', $pagamento->idpagamento)}}" class="btn btn-default btn-xs" role="button"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
	                        </td>
	                    </tr>    
	                    @endforeach                                                 
	                    </tbody>
	                </table>                          
	            </div>
	           
	        </div>    
    	</div>
    </div>
</div>

<!-- Modal -->
<div id="modalFilter" class="modal fade" role="dialog">
	<div class="modal-dialog">
  
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Modal Header</h4>
		</div>
		<div class="modal-body">
			{!! Form::open(['method'=>'GET','url'=>route('profissional.index')])  !!}
			<br>                         
			<div class="form-group">
				{{ Form::label('nome', 'Profissional:') }}
				{{ Form::text('nome', '', ['class' => 'form-control', 'placeholder' => 'Nome do profissional...']) }}   
			</div>
			<br>   
			<div class="form-group">
				{{ Form::label('cpf', 'CPF:') }}
				{{ Form::text('cpf', '', ['class' => 'form-control', 'placeholder' =>'CPF do profissional ...']) }}   
			</div>
								 
			<div class="form-group">
				{{ Form::submit('Buscar', ['class' => 'btn btn-default btn-sm']) }}
				<a href="{{ route('profissional.index') }}" class="btn btn-default btn-sm" role="button">Limpar</a>
			</div>
			{!! Form::close() !!} 
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
  
	</div>
  </div>
@endsection


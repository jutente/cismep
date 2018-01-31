@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
       
	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_parametro')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('deleted_parametro') }}
	        </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_parametro')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('create_parametro') }}
	        </div>
	        @endif
	        <div class="panel panel-default">
	            <div class="panel-heading">
					<div class="row">
					  <div class="col-sm-4">
					  	Parametros
					  </div>
					  <div class="col-sm-12 text-right">
					  	<div class="btn-group btn-group-sm">					  		
							<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalFilter">Filtro</a>
						 					  			
							<a href="{{route('parametro.create')}}" class="btn btn-primary">Novo Registro</a>							
							  
					  	</div>					  	
					  </div>
					</div>
				</div>	
				<br>

	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                    <tr>
							<th>Descriçao</th>	   
							<th>Plantao util</th> 
							<th>Plantao nao util</th> 
	                    </tr>
	                    </thead>

	                    <tbody>
							@foreach($parametros as $p)
							<tr>
								<td>{{$p->descricao}}</td>
								<td>{{'R$ '.number_format($p->plutil, 2, ',', '.')}}</td>
								<td>{{'R$ '.number_format($p->plnaoutil, 2, ',', '.')}}</td>
							
								<td style="text-align: right">
                                    <a href="{{route('parametro.edit',$p->id)}}" class="btn btn-default btn-xs" role="button">Alterar</a>
                                
                                    <a href="{{route('parametro.show',$p->id)}}" class="btn btn-danger btn-xs" role="button">Excluir</a>
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
			{!! Form::open(['method'=>'GET','url'=>route('parametro.index')])  !!}
			<br>                         
			<div class="form-group">
				{{ Form::label('parametro', 'parametro:') }}
				{{ Form::text('descricao', '', ['class' => 'form-control', 'placeholder' => 'Nome do parametro...']) }}   
			</div>
			<br>   
			
								 
			<div class="form-group">
				{{ Form::submit('Buscar', ['class' => 'btn btn-default btn-sm']) }}
				<a href="{{ route('parametro.index') }}" class="btn btn-default btn-sm" role="button">Limpar</a>
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
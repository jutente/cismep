@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
       
	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_competencia')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('deleted_competencia') }}
	        </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_competencia')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('create_competencia') }}
	        </div>
	        @endif
	        <div class="panel panel-default">
	            <div class="panel-heading">
					<div class="row">
					  <div class="col-sm-4">
					  	competencias
					  </div>
					  <div class="col-sm-12 text-right">
					  {{--  	<div class="btn-group btn-group-sm">					  		
							<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalFilter">Filtro</a>
						 					  			
						  	<a href="{{route('competencia.create')}}" class="btn btn-primary">Novo Registro</a> 							
							  
					  	</div>  --}}					  	
					  </div>
					</div>
				</div>	
				<br>

	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                    <tr>
							<th>Ano</th>	   
							<th>Mes</th> 
						</tr>
	                    </thead>

	                    <tbody>
							@foreach($competencias as $p)
							<tr>
							
								<td>{{$p->ano}}</td>
								<td>{{$p->mes}}</td>
							
								<td style="text-align: right">
                                    <a href="{{route('competencia.edit',$p->id)}}" class="btn btn-primary btn-xs" role="button">Alterar</a>
                                
                                   {{--   <a href="{{route('competencia.show',$p->id)}}" class="btn btn-danger btn-xs" role="button">Excluir</a>  --}}
                                </td>			
								
							</tr>    
							@endforeach                                                 
	                    </tbody>
	                </table>                          
				</div>
				<div class="row" align="center">
					{{$competencias->links()}}
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
			{!! Form::open(['method'=>'GET','url'=>route('competencia.index')])  !!}
			<br>                         
			<div class="form-group">
				{{ Form::label('competencia', 'competencia:') }}
				{{ Form::text('mes', '', ['class' => 'form-control', 'placeholder' => 'Mes da competencia...']) }}   
			</div>
			<br>   
			
								 
			<div class="form-group">
				{{ Form::submit('Buscar', ['class' => 'btn btn-default btn-sm']) }}
				<a href="{{ route('competencia.index') }}" class="btn btn-default btn-sm" role="button">Limpar</a>
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
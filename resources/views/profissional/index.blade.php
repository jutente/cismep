@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
       
	        {{-- avisa se um usuario foi excluido --}}
	        @if(Session::has('deleted_profissional')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('deleted_profissional') }}
	        </div>
	        @endif
	        {{-- avisa quando um usuário foi modificado --}}
	        @if(Session::has('create_profissional')) 
	        <div class="alert alert-info">
	            <a href="#" class="close" data-dismiss="alert" aria-label="Fechar">&times;</a>
	            <strong>Info!</strong> {{ session('create_profissional') }}
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
						 					  			
							<a href="{{route('profissional.create')}}" class="btn btn-primary">Novo Registro</a>							
							  
					  	</div>					  	
					  </div>
					</div>
				</div>	
				<br>

	            <div class="table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                    <tr>
	                        <th>Profissional</th>
							<th>Cargo</th>
							<th>Especialidade</th>
							<th>CPF</th>
							<th>Registro</th>
							<th>Telefone</th>
							<th>Celular</th>
	                        <th>Data do Cadastro</th>
	                    </tr>
	                    </thead>

	                    <tbody>
							@foreach($profs as $p)
							<tr>
								<td>{{$p->nome}}</td>	
								<td>{{$p->cargo}}</td>
								<td>{{$p->especialidade}}</td>	
								<td>{{$p->cpf}}</td>
								<td>{{$p->registro}}</td>	
								<td>{{$p->tel}}</td>
								<td>{{$p->cel}}</td>	
								<td>{{\Carbon\Carbon::parse($p->dtcadastro)->format('d/m/Y')}}</td>		
								<td style="text-align: right">
                                    <a href="{{route('profissional.edit',$p->id)}}" class="btn btn-default btn-xs" role="button">Alterar</a>
                                
                                    <a href="{{route('profissional.show',$p->id)}}" class="btn btn-danger btn-xs" role="button">Excluir</a>
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
				{{ Form::text('profissional', '', ['class' => 'form-control', 'placeholder' => 'Nome do profissional...']) }}   
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
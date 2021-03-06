@extends('layouts/admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissable" role="alert">
    <a href="/insumo" class="close3" data-dismiss="alert" aria-label="close">&times;</a>
 {{Session::get('message')}}
</div>
@endif

@section('body')    
<h3>Registro de insumos</h3>
<br>
<hr></hr>
<br><br>
<div class="btn--aciones">
<a href="#modalregistroinsumo" type="button" class="btn-primario">+ Nuevo insumo</a>
{!!Form::open(['route' => 'insumo.index', 'method' => 'GET', 'class'=> 'navbar-form navbar-left', 'role'=>'search']) !!}
      <div class="form-group">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre del insumo'])!!}
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
    {!! Form::close() !!}
</div>
<br><br><br>
 <center>
    <div class="tabla">
        <table class="tabla--datos">
            <thead class="titulo">
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th>Editar</th>

                </tr>
            </thead>
            <tbody>
            	@foreach ($insumos as $key => $insumo)
					<tr class="tabla--datos-fila">
						<th scope="row">{{$insumo->id_insumos}}</th>
						<td>{{$insumo->nombre}}</td>
						<td>{{$insumo->stock}}</td>
						<td>{{$insumo->descripcion}}	</td>
						<td>{!!link_to_route('insumo.edit', $title = 'create', $parameters = $insumo, $attributes = ['class'=>'material-icons btn-accion'])!!}{{-- 
                                            <a href="paciente.edit" type="button" class="btn-accion">Edit</a> --}}
                        </td>
					</tr>
				@endforeach
            </tbody>
        </table>
        <br>
	{!!$insumos->render()!!}
    </div>

</center>
    </div>
    </div>

<!-- inicio del modal -->
<div id="modalregistroinsumo" class="modalDialog">

@include('request')
    <div>
        {!!Form::open(['route'=>'insumo.store', 'method'=>'POST'])!!}
        <a href="#close" title="Close" class="close">X</a>
        <h2>Nuevo insumo</h2>
        <div class="iniciar--campo">
            <h5>{!!Form::label('nombre','Nombre:')!!}</h5>
            {!!Form::text('nombre',null,['class'=>'input--formulario','placeholder'=>'Nombres del insumo'])!!}
        </div>
        <br>
        <div class="iniciar--campo">
            <h5>{!!Form::label('stock','Stock:')!!}</h5>
            {!!Form::text('stock',null,['class'=>'input--formulario','placeholder'=>'Unidades disponibles'])!!}
        </div>
        <br>
        <div class="iniciar--campo">
            <h5>{!!Form::label('descripcion','Descripcion:')!!}</h5>
            {!!Form::text('descripcion',null,['class'=>'input--formulario','placeholder'=>'Descripcion del insumo'])!!}
        </div>
        <br>
        {!!Form::submit('Agregar',['class'=>'btn-primario'])!!}
        {!!Form::close()!!}
    </div>
</div>
<!-- fin del modal -->
@endsection
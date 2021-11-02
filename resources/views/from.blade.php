@extends('theme.theme')

@if(isset($empleado))
@section('title', 'Editar empleado')
@else
@section('title', 'Agregarr empleado')
@endif

@section('contenido')
<div class="ui container">
    @if(isset($empleado))
    <h1>Editar empleado</h1>
    @else
    <h1>Agregar empleado</h1>
    @endif


    <h2 class="ui dividing header">Empleado</h2>

    <button class="ui button" onclick="back()">
        Regresar
    </button>


    <div class="ui raised very padded text container segment">
        @if(isset($empleado))
        <form action="{{url('empleado/') .'/'. $empleado->id}}" class="ui form" method="POST">
        @else
        <form action="{{url('empleado/') }}" class="ui form" method="POST">
        @endif

            {!! csrf_field() !!}

            @if(isset($empleado))
            {{ method_field('PUT') }}
            @endif

            <div class="field">
                <label>Nombre(s)</label>
                @if(isset($empleado))
                <input type="text" name="nombre" placeholder="Nombre(s)" value="{{$empleado->nombre}}">
                @else
                <input type="text" name="nombre" placeholder="Nombre(s)">
                @endif

            </div>
            <div class="field">
                <label>Apellido paterno</label>
                @if(isset($empleado))
                <input type="text" name="Apellidop" placeholder="Apellido paterno" value="{{$empleado->apellido_p}}">
                @else
                <input type="text" name="Apellidop" placeholder="Apellido paterno">
                @endif

            </div>

            <div class="field">
                <label>Apellido materno</label>
                @if(isset($empleado))
                <input type="text" name="Apellidom" placeholder="Apellido materno" value="{{$empleado->apellido_m}}">
                @else
                <input type="text" name="Apellidom" placeholder="Apellido materno">
                @endif
            </div>

            <div class="field">
                <label>RFC</label>
                @if(isset($empleado))
                <input type="text" name="rfc" placeholder="RFC" value="{{$empleado->rfc}}">
                @else
                <input type="text" name="rfc" placeholder="RFC">
                @endif
            </div>

            <div class="field">
                <label>Fecha de nacimiento</label>
                @if(isset($empleado))
                <input type="Date" name="fechanacimiento" value="{{$empleado->fecha_nacimiento}}">
                @else
                <input type="Date" name="fechanacimiento">
                @endif

            </div>
            <button class="ui button primary" type="submit" style="float: right;">Guardar</button>
        </form>
    </div>

</div>
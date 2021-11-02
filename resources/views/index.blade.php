@extends('theme.theme')
@section('title', 'Empleados')
@section('contenido')
<div class="ui container">

    <h1>Tabla de empleados</h1>

    @if($message = Session::get('message'))

    <div class="ui positive message">
        <i class="close icon"></i>
        <div class="header">
            {{ $message }}
        </div>
    </div>
    @endif

    <h2 class="ui dividing header">Empleados</h2>

    <table class="ui compact celled definition table">
        <thead class="full-width">
            <tr>
                <th>Nombre(s)</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>RFC</th>
                <th>Fecha de nacimiento</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td data-label="Nombre(s)">{{$empleado->nombre}}</td>
                <td data-label="Apellido Paterno">{{$empleado->apellido_p}}</td>
                <td data-label="Apellido Materno">{{$empleado->apellido_m}}</td>
                <td data-label="RFC">{{$empleado->rfc}}</td>
                <td data-label="Fecha de nacimiento">{{$empleado->fecha_nacimiento}}</td>
                <td data-label="Acciones">
                    <div class="ui buttons" colspan="2">               
                        <a href="empleado/{{$empleado->id}}/edit" class="ui blue basic button">Editar</a>
                        <!-- <button class="ui green basic button">Ver</button> -->
                        <a href="empleado/{{$empleado->id}}" class="ui green basic button">Ver</a>

                        <form method="POST" action="empleado/{{$empleado->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="ui red basic button" type="submit" onclick="return confirm('¿Estas seguro?')">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="full-width">
            <tr>
                <th colspan="7">
                    <div class="ui right floated small primary labeled icon button" onclick="add()">
                        <i class="user icon" id="add"></i> Agregar empleado
                    </div>
                </th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    function add() {
        window.location = '/empleado/create';
    }
</script>
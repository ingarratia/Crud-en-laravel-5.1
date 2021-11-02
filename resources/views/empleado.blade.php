@extends('theme.theme')
@section('title', 'Empleado - ' .$empleado->nombre )
@section('contenido')

<div class="ui container">
    <button class="ui button" onclick="back()">
        Regresar
    </button>
    <div class="ui raised very padded text container segment">
        <div class="ui card">
            <div class="image">
                <img src=" {{ url('/img/kristy.png') }}">
            </div>
            <div class="content">
                <a class="header">{{$empleado->nombre}}</a>
                <div class="meta">
                    <span class="date">{{$empleado->fecha_nacimiento}}</span>
                </div>
                <div class="description">
                    {{$empleado->nombre . ' '  . $empleado->apellido_p . ' ' .$empleado->apellido_m }}
                    <p>{{$empleado->rfc}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
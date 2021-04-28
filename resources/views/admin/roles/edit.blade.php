@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Editar Role</h1>
@stop

@section('content')
    @if ( session('info') )
        <div class="alert alert-primary" role="alert">
            <strong>¡Éxito!</strong> {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put'. 'autocomplete' => 'off']) !!}
               @include('admin.roles.partials.form')
               {!! Form::submit('Actualizar Role', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
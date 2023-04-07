@extends('layouts.app')

@section('content')
<div class="container">

@if (Session::has('mensaje'))
{{ Session::get('mensaje')}}
    
@endif
<a href="{{ url('pelicula/create') }}" class="btn btn-success" >Registrar Nueva Pelicula</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Duracion Horas</th>
            <th>Minutos</th>
            <th>Segundos</th>
        </tr>
    </thead>


    <tbody>
        @foreach ( $peliculas as $pelicula)
            
        <tr>
            <td>{{ $pelicula->id }}</td>
            <td>{{ $pelicula->Nombre }}</td>
            <td>{{ $pelicula->Duracion_horas }}</td>
            <td>{{ $pelicula->Duracion_minutos }}</td>
            <td>{{ $pelicula->Duracion_segundos }}</td>
            <td>
                <a href="{{ url('/pelicula/'.$pelicula->id.'/edit') }}" class="btn btn-warning">Editar</a>
                 | 
                 <form action="{{ url('/pelicula/'.$pelicula->id) }}" class="d-inline" method="post">
                    @csrf
                    {{  method_field('DELETE') }}
                <input type="submit" onclick="return confirm('Quieres Borrar')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>

        @endforeach
       
    </tbody>
</table>
</div>
@endsection
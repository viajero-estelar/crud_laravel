
<h1>{{ $modo }} pelicula</h1>

@if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
       <ul>

        @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
@endforeach

       </ul>




    </div>


    
@endif





<div class="form-group">
    <label for="Nombre">Nombre de Pelicula: </label>
<input class="from-control" type="text" name="Nombre" id="Nombre" value="{{ isset($pelicula->Nombre )?$pelicula->Nombre:'' }}">
</div>



<label for="">Duracion  de pelicula: </label>
<label for="duracion_horas">Horas</label>
<input type="number" name="duracion_horas" id="duracion_horas" value="{{ isset($pelicula->Duracion_horas)?$pelicula->Duracion_horas:''}}" min="0" max="23">
<br>

<label for="duracion_minutos">Duracion Minutos </label>
<input type="number" name="duracion_minutos" id="duracion_minutos" value="{{ isset($pelicula->Duracion_minutos)?$pelicula->Duracion_minutos:'' }}" min="0" max="59" >
<br>


<label for="duracion_segundos">Duracion Segundos </label>
<input type="number" name="duracion_segundos" id="duracion_segundos" value="{{ isset($pelicula->Duracion_segundos)?$pelicula->Duracion_segundos:'' }}" min="0" max="59" ><br>
<br>


<input type="submit" value="{{ $modo }} datos"> <br>
<a href="{{ url('pelicula/') }}">Regresar</a>
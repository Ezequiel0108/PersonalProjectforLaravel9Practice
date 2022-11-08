@extends('layouts.plantilla')

@section('Title','contactanos')

@section('content')




<h1>Dejanos un Mensaje</h1>

@php
    if(isset($mensaje)){
      echo $mensaje;
    }
    @endphp

<form action="{{route('contactanos.store')}}" method="post">
 @csrf
    <div class="mb-3">
      <label for="" class="form-label">Name</label>
      <input type="text"
        class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    @error('name')
    <p class="text-danger">Tuviste el siguiente error: {{$message}}</p>
      
    @enderror

    <div class="mb-3">
        <label for="" class="form-label">Correo</label>
        <input type="email"
          class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Dejanos tu correo para comunicarte</small>
      </div>
      @error('email')
      <p class="text-danger">Tuviste el siguiente error: {{$message}}</p>
        
      @enderror

      <div class="mb-3">
        <label for="" class="form-label">Dejanos tu comentario</label>
        <textarea class="form-control" name="comments" id="" rows="5"></textarea>
      </div>
      @error('comments')
      <p class="text-danger">Tuviste el siguiente error: {{$message}}</p>
        
      @enderror

      <button class="btn btn-primary" type="submit">Enviar comentario</button>


</form>

   
    
    <script>
   
     
    </script>
    
  
@endsection


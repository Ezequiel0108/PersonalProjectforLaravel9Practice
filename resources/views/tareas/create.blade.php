@extends('layouts.plantilla')

@section('Title','create')

@section('content')

<h1  class="border border-success text-center mt-3"> Aquí se crearán tus tareas </h1>
<div class="col">
    <div class="row">
        

        <form action="{{route('tareas.store')}}" method="post" enctype="multipart/form-data">
            
         @csrf
            <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" value="{{old('name')}}"
                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            <small id="helpIdName" class="form-text text-muted">Escribe el nombre de la tarea</small>
            @error('name')
            <p class="text-danger"> you have the next error {{$message}}</p>
    
            @enderror
            </div>

            <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea class="form-control" name="description" id="" rows="3">{{old('description')}}</textarea>
            @error('description')
            <p class="text-danger"> you have the next error {{$message}}</p>
    
            @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Category</label>
                <input type="text"  value="{{old('category')}}"
                class="form-control" name="category" id="" aria-describedby="helpId" placeholder="">
                <small id="helpIdCategory" class="form-text text-muted">Escribe tu categoria</small>
                @error('category')
                <p class="text-danger"> you have the next error {{$message}}</p>
        
                @enderror
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Agrega tu imagen</label> 
              <input type="file" 
              class="form-control" name="imagen" id="imgInp"  aria-describedby="helpId" placeholder="">
              <br>
              <img id="spaceImg" src="https://via.placeholder.com/150" alt="" width="150px" height="150px"/>
              <br>
              <small id="helpId" class="form-text text-muted">imagen</small>
              <br>
              

             
           @error('imagen')
           <p class="text-danger"> you have the next error {{$message}}</p>
               
           @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
</div>
<script>


  input= document.querySelector('#imgInp');

    input.addEventListener('change',(e)=>{
        previewImage(e,'#spaceImg');

    })


 previewImage=(event,querySelector)=>{
//Recuperamos el input que desencadeno la acción
const input = event.target;
console.log(input.files)

//Recuperamos la etiqueta img donde cargaremos la imagen
imgPreview = document.querySelector(querySelector);
// Verificamos si existe una imagen seleccionada
//cuando existe una imagen lenght siempre es 1
if(input.files.length==0) return
//Recuperamos el archivo subido
file = input.files[0];
//Creamos la url
objectURL = URL.createObjectURL(file);
//Modificamos el atributo src de la etiqueta img
imgPreview.src = objectURL;

     
}


</script>


@endsection
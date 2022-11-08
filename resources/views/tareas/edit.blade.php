

<h1  class="border border-success text-center mt-3"> editar tarea </h1>
<div class="col">
    <div class="row">
        

        <form action="{{route('tareas.update',$tarea->id)}}" method="post" enctype="multipart/form-data">
            
         @csrf
         @method('put')
            <div class="mb-3">
            <label  class="form-label" >Name</label>
            <!--El segundo parametro de old es el valor que quieres que tenga por defecto-->
            <input type="text"  name="name" id=""  value="{{old('name',$tarea->name)}}">
            <small id="helpIdName" class="form-text text-muted">Escribe el nombre de la tarea</small>
            @error('name')
            <p class="text-danger"> you have the next error {{$message}}</p>
    
            @enderror
            </div>


            <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea class="form-control" name="description" id="" rows="3">{{old('description',$tarea->description)}}</textarea>
            @error('description')
            <p class="text-danger"> you have the next error {{$message}}</p>
    
            @enderror
        </div>

            <div class="mb-3">
                <label  class="form-label">Category</label>
                <input type="text"
                class="form-control" value="{{old('category',$tarea->category)}}" name="category" id="" aria-describedby="helpId" placeholder="">
                <small id="helpIdCategory" class="form-text text-muted">Escribe tu categoria</small>
                @error('category')
                <p class="text-danger"> you have the next error {{$message}}</p>
        
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Agrega tu imagen</label>
                <input type="file"
                  class="form-control" name="imagen" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">imagen</small>
                @error('imagen')
                <p class="text-danger"> you have the next error {{$message}}</p>
        
                @enderror
            </div>
            </div>

            <button type="submit" class="btn btn-primary">editar</button>


        </form>
    </div>
</div>
<a href="{{route('tareas.index')}}">Inicio</a>
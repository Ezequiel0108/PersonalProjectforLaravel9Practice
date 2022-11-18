@extends('layouts.plantilla')

@section('Title','index')

@section('content')

   
    <div class="container">
        <h1 class="text-center"> Tus tareas</h1>
    
       <br><div class="table-responsive ">
            <table class="table table-primary table-hover table-bordered border-primary">
               
                    <thead class="table-dark">
                        <tr>
                           
                            <th >name</th>
                            <th>imagen</th>
                            <th>estado</th>
                            <th>fecha inicio</th>
                           
                        </tr>
                    </thead>
                @foreach ($tareas as $tarea)
                    <tbody >
                        <tr   >
                          
                            <td ><a href="{{route('tareas.show',$tarea->id)}}">{{$tarea->name;}}</a></td>
                           <td>  <img src="{{asset('storage'.'/'.$tarea->imagen)}}" width="100" height="100" alt=""></td> 
                            <td> {{$tarea->estado($tarea->status)}}</td> 
                            <td> {{$tarea->created_at}}</td> 
                           
                            
                           <?php /*
                           //esta es otra forma de modificar el dato traido de la bd si es 0, o 1
                           if($tarea->status==1){
                                echo 'listo';
                            }else{
                                echo 'no ha terminado';
                            }  */?>
 
                        </tr>
                            
                    </tbody>
                @endforeach
            </table>
        </div>
        {{$tareas->links()}}
    </div>

    @php
        $type= "success";
    @endphp
    <x-alert1 id="Id que esta remplazando" class="border border-primary"  :type="$type">
  
        <x-slot name="title">
    
        <p>Este es el titulo del slot y representa a la variable title</p>
        </x-slot>
        <x-slot name="var2">
            <p>Esta es otra variable</p>
        </x-slot>
    
       <p>Este es texto de prueba y representa a la variable "slot", 
        este textop tiene que esatr dentro de las etiquetas x-alert 
        y por default tiene que llarmarse la variablñe slot.
        por otro lado lo que esta dentro de las etiquetas slot, puedes darle en 
        name, el nombre que tu quieras y esa seria su nombre de variable
       </p>

       </x-alert1>

    


    <script>

   
        
    </script>
    
  
@endsection


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
        {{$tareas->links();}}
    </div>
    <script>
   
        
    </script>
    
  
@endsection


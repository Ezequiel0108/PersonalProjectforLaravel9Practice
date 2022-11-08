@extends('layouts.plantilla')

@section('Title','show')

@section('content')


<h5 class="p-3"> Tu tarea es: {{$tarea->name}} </h5>
<p>
    Lo que tienes que hacer es lo siguiente: {{$tarea->description}}
</p><br>
<p>
    La categoria de esta tarea es: {{$tarea->category}}
</p>
<br>
<img src="{{asset('storage'.'/'.$tarea->imagen)}}" width="100px" height="100px" alt="">
<br>




<a href="{{route('tareas.edit',$tarea->id)}}">Editar Tarea</a>


<form   action="{{route('finalizar',$tarea->id)}}" method="post">
    @method('put')
    @csrf
   
<button {{$tarea->status==0?"":"disabled"}} type="submit" class="btn btn-warning">{{$tarea->status==0?"finalizar":"Ya la has finalizado"}}</button>
</form>


<form  action="{{route('tareas.destroy',$tarea->id)}}" method="post">
    @csrf
    @method('delete')
<button type="submit" class="delete btn btn-danger">borrar</button>
</form>





<script>
  const borrar= document.querySelector('.delete');
  borrar.addEventListener('click',(e)=>{
  
let confirmar=confirm("Estás seguro de eliminar?");

if (confirmar){
    alert("Elemento borrado");
}else{
    e.preventDefault();

    alert("Tu elementó se conservó xd");

}
  });
/*
function prevenir(e){
    e.preventDefault();
    alert("hola");*/

</script>


@endsection

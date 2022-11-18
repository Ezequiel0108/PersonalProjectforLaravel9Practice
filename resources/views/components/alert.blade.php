<!-- En caso que no exista el atributo tipo define por default-->
@props(['type'=>'success'])
<!-- si no rescatamos los atributos en los props se guardan en la variable attribute-->

@dump($attributes)



@php
switch ($type) {
        case 'danger':
        $class="alert-danger";
        # code...
        break;
    
        case 'success':
        $class="alert-success";
        # code...
        break;
     
    default:
        $class="alert-primary";
        # code...
        break;
}

    

@endphp

<!-- el merge combina las clases aunque podrias solo incluir tus estilos en el componente en el caso de los otros atrubutos como id, los remplaza-->
<div  {{$attributes->merge(['class'=> "alert $class ", "id"=>"idDefecto"])}}  role="alert">
   <h1>{{$title}}</h1>
   <p>{{$slot}}</p>
   <p>{{$var2}}</p>
</div>

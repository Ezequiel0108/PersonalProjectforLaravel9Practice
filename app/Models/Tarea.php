<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Tarea extends Model
{

    use HasFactory;

    // Aqui le estaria indicando que ignore la convención y administre
    //la tabla  users protected $table="users";
  
    

    protected function name():Attribute
    {
        return new Attribute(
            //asi seria con función flecha
            //set:fn($name)=>strtolower($name);
                set:function($name){
                        return strtolower($name);
                }
    
        );
        
    }
    /*aqui ingresarias los datos que quieres proteger y que nadie pueda ingresar. por ejemplo
    si hubiese algun tipo de status donde 0 significa no activo y 1 significa activo
    en ese caso si alguien modifica el formulario y nos inyecta que status=1 estaria poniendo 
    en riesgo la seguridad asi que para que nadie pueda ingresar eso, defines que ese campo va a ser 
    ignorado en este caso como no tenemos un campo que proteger pues solo lo dejamos vacio
     protected $guarded=['status'];*/
     protected $guarded=['status'];
    
   //ejemplo para estatus por ejemplo
   //const estado=['pendiente','finalizada'];
  /*public function estado(){
    return estado[$this->status];
  }*/


   public function estado($valor){

    
     if($valor==0){
     return "Tarea pendiente";}
     else{
        return $valor;
     }
   }
   
}



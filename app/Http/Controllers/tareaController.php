<?php

namespace App\Http\Controllers;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storageTarea; //en vez del Requets comun que administraba lo que se mandaba en el form
use Carbon\CarbonTimeZone;

//ahora se mandan en storageTarea que es donde nosotros hacemos las validaciones

class tareaController extends Controller
{

    public function ajax(){
      return view('tareas.ajax');
    }

    public function index(){
      $tareas= Tarea::paginate(5);
        return view('tareas.index',compact('tareas'));

      /*return Tarea::where('id','49')->addSelect(['Usuario' => User::select('name')
    ->whereColumn('id', 'tareas.id')
    
    ->limit(1)
    ])->get();

  */
  
    }

    public function create(){
        return view('tareas.create');
    }
    //request guarda todo lo mandado desde los formularios
    //ahora es storageTarea ya que yo cree ese request que contendra las validaciones
    public function store(storageTarea $request){
          
       /*los datos los pasamos directamente al archivo de request que se creo
       app/http/requests/storageTarea en el metodo rules
       //validamos, con los names de los inputs del form
       $request->validate([
        'name'=>'required',
        'description'=>'required',
        'category'=>'required',
        'file'=>'required'
      ]);*/

      //forma de insertar si no tenemos muchas propiedades en nuestra tabla
      /*
        $tarea= new Tarea();
        $tarea->name= $request->name;
        $tarea->description= $request->description;
        $tarea->category=$request->category;
         $tarea->imagen=$request->file->store('archivos','public');
        $tarea->save();
        return redirect()->route('show',$tarea->id);*/
       
        /*Forma adecuada si es que tuviesemos muchas propiedades
        en el modelo se agregan los capos que quieres que si se ingresen para evitar que alguien trate de modificar
       o aagregar datos malos. */
        $datosform=$request->all();
  
        if($request->hasFile('imagen')){
        $datosform['imagen']=$request->file('imagen')->store('archivos','public');
        }
        Tarea::create($datosform);
       // return $datosform;
        return redirect()->route('tareas.index',compact('datosform'));
    
       
   
    }
    public function show($id){
        //con este buscamos el registro con el $id
        //en el edit pondré la otra forma
        $tarea= Tarea::find($id);
        return view('tareas.show',compact('tarea'));
    }
    //aqui le indicas que le pasaras los datos del id que le estas pasando 
    public function edit(Tarea  $tarea){
     
   return view('tareas.edit', compact('tarea'));
   
    }


    public function update(Request $request,Tarea $tarea){
      //aqui hago la validación desde aqui ya que el campo imagen no se le puede asignar un value por defaul

        $request->validate([
            //el or es para poner mas validaciones, podemos encontrarlo dentro de validations
            'name'=>'required|min:5',
            'description'=>'required',
            'category'=>'required'
          ]);
       //esta seria la forma de editar en caso de que tuvieses pocos datos del form
       /* if($request->hasFile('imagen')){
            Storage::disk('public')->delete($tarea->imagen);
            $tarea->imagen=$request->file('imagen')->store('archivos','public');
        }
        $tarea->name= $request->name;
        $tarea->description=$request->description;
        $tarea->category=$request->category;    
        $tarea->save();*/

        //forma adecuada si tenemos muchos registros
        $datos=$request->all();
        if($request->hasfile('imagen')){
        Storage::disk('public')->delete($tarea->imagen);
        $datos['imagen']=$request->file('imagen')->store('archivos','public');

        }
        $tarea->update($datos);
        return redirect()->route('tareas.show',$tarea->id); 
      
       
    }
    public function destroy ($tarea){
    
        $tarea1=Tarea::find($tarea);
        Storage::delete('public/'.$tarea1->imagen);
      
        Tarea::destroy($tarea);
       
        return redirect()->route('tareas.index');

    }
    public function finalizar(Tarea $tarea){

 
  $fecha=Carbon::now();


  
  $tarea->status=$fecha;

  $tarea->save();
  return redirect()->route('tareas.index');


   //no funciona aqui 
    /*$datos= Tarea::find($tarea['id']);
    $tarea->update($datos);*/
    
 
   
 }
}

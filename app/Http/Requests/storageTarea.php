<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storageTarea extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:5',
            'description'=>'required',
            'category'=>'required',
            'imagen'=>'required'
            //
        ];
    }
    //modificar los nombres de los atributos, o los names que arrojan del form
    public function attributes()
    {
        return[
            //"cuando el campo "nombre del atributo" falle entonces muestras eso:
            'name'=>'name of you task there any bad whit this '

        ];
          
        
    }
    //modificar el mensaje que muestra
    public function messages()
    {
        return[
            //hay que especificar el mensaje de que validación
            'name.min'=>"Hey, you neet to have a minimun of five characters"

        ];
    }
}

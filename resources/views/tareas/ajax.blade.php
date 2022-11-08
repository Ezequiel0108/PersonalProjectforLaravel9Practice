<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Estos son los elementos traidos con ajax</h1>
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
                           <img id="prueba" src="" alt="">
                        </tr>
                    </thead>
               
                    <tbody id="tbody">
                        <tr  id="tr">
                        <td >ssss</td>
                        
                        </tr>
                    
                    </tbody>
              
            </table>
        </div>
        
    </div>
    

    <script> 
     

(()=>{
    const $tbody= document.getElementById('tbody');
    $fragment=document.createDocumentFragment();
    fetch('http://127.0.0.1:8000/tareas').then((resolve)=>{
        //console.log(resolve);
        //si no hay error lo manda al siguiente then de lo contrario al catch
        //el primer resolve te retorna la respuesta literal en "response" es por eso que mandamos el resultado 
        //al siguiente then pero ahora en tipo json
        //console.log(resolve)  
        return  resolve.ok? resolve.json():Promise.reject(resolve);
    }).then((json)=>{
          //console.log(json);
          json.forEach((element)=>{
            $tr=document.createElement('tr');
            $tdname=document.createElement('td')
            $tdinicio=document.createElement('td')
            $tdimg=document.createElement('td')
         
           ruta=element.imagen
           
           $img=document.createElement('img') 
           $img.width="100"
           $img.height="100"
           $img.src=`{{asset('storage/${ruta}')}}`
           
           
    
        
            $tdimg.appendChild($img);
            $tdname.innerHTML=element.name
            $tdinicio.innerHTML=element.created_at
         
            $tr.appendChild($tdimg)
            $tr.appendChild($tdname)
            $tr.appendChild($tdinicio)
            $fragment.appendChild($tr);
           //console.log($li);
          
        })
        $tbody.appendChild($fragment)

      


    }).catch((error)=>{
        console.log("Ocurrió el siguiente error:",error.status)
    }).finally((independiente)=>{
        independiente="este se ejecuta independientemente sea correcto o malo"
        console.log(independiente);
    });
})();

    </script>
</body>
</html>
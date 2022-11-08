let array=[1,3,4,5,-3];

const searchMin=(array)=>{
    let min=array[0];
    for (let index=1; index < array.length; index++) {
       if(min>array[index]){
        min=array[index];
        continue;
       }
        
    }
 return min;
}
const searchMax=(array)=>{
    let max=array[0];
    for (let index=1; index < array.length; index++) {
       if(max<array[index]){
        max=array[index];
        continue;
       }
        
    }
  return max;

}
const sumarMinMaxOfArray=(array)=>{
    let minimo=searchMin(array);
    let maximo=searchMax(array);
    let suma= parseInt(minimo)+parseInt(maximo);
    console.log(suma);
    

}

sumarMinMaxOfArray(array);
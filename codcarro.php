<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulario Calidad Carro</title>
</head>
<body background="https://static.vecteezy.com/system/resources/previews/004/257/224/original/vehicle-cartoon-background-seamless-pattern-with-toy-car-children-s-style-hand-drawn-design-used-for-prints-wallpaper-fabrics-textiles-vector.jpg">
<?php 

 /*$Arreglo_1=[null];
 $Arreglo_2=[null];
 $Arreglo_3=[null];*/
	
 $x1 =$_REQUEST['pr'];
 $x2 =$_REQUEST['ma'];
 $x3 =$_REQUEST['ki'];
	
 // echo "Precio del Carro<br>";
 $Arreglo_1[0]=trapezoidal(-0.37,-4,30,50,$x1);
 $Arreglo_1[1]=triangular(45,60,80,$x1);
 $Arreglo_1[2]=gaussiana(8,100,$x1);
 //echo $Arreglo_1[0]."<br> ".$Arreglo_1[1]."<br> ".$Arreglo_1[2] ;
 //echo"<br><br>";

//echo "Calidad de Materiales del Carro<br>";
 $Arreglo_2[0]=trapezoidal(-0.37,-4,25,50,$x2);
 $Arreglo_2[1]=triangular(45,60,78,$x2);
 $Arreglo_2[2]=gaussiana(9.5,100,$x2);
 //echo $Arreglo_2[0]." <br>".$Arreglo_2[1]." <br>".$Arreglo_2[2];
 //echo"<br><br>";

//echo "Kilometraje del Carro<br>";
 $Arreglo_3[0]=trapezoidal(-0.37,-4,23,42,$x3);
 $Arreglo_3[1]=triangular(40,60,85,$x3);
 $Arreglo_3[2]=gaussiana(9.51,100,$x3);
 //echo $Arreglo_3[0]."<br> ".$Arreglo_3[1]."<br>".$Arreglo_3[2] ;
 //echo"<br><br>";

	
 function triangular($a, $b, $c, $x){
   if($x <= $a){
    $y = 0;
   }
   else if($a <= $x && $x <= $b){
    $y = ($x - $a)/($b - $a);
   }
   
   else if($b <= $x && $x <= $c){
    $y = ($c - $x)/($c - $b);
   }
   else{
    $y = 0;
 }
   return $y*100;
  
  }
  


 function trapezoidal($a,$b,$c,$d,$x){

    if($x <= $a || $x >= $d){
    $y = 0;
   }
   else if($a <= $x && $x <= $b){
    $y = ($x - $a)/($b - $a);
   }
   else if($c <= $x && $x <= $d){
    $y = ($d - $x)/($d - $c);
   } 
   else {
    $y = 1;
   }
   return $y*100;
 
 }

	
 function gaussiana($desv,$prom,$x){
   $y = exp( -(($x-$prom)*($x-$prom)) / (2*$desv*$desv) );
   $y = round($y,4);
  return $y*100;
 }

//1. Crear el arreglo_agregacion
$GLOBALS['$arreglo_agregacion'] = 0; $arreglo_agregacion = array();

//2. Limpiar el arreglo para poderlo usar
for($x=0;$x<=100;$x++){
  $arreglo_agregacion[$x]=0;
}

//REGLA 1
if($Arreglo_1[0]==0 || $Arreglo_2[0]==0 || $Arreglo_3[0]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[0],$Arreglo_2[0],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = trapezoidal(-37.5,-41.67,30,55,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}

//REGLA 2
if($Arreglo_1[0]==0 || $Arreglo_2[1]==0 || $Arreglo_3[0]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[0],$Arreglo_2[1],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = trapezoidal(-37.5,-41.67,30,55,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 3
if($Arreglo_1[1]==0 || $Arreglo_2[1]==0 || $Arreglo_3[1]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[1],$Arreglo_2[1],$Arreglo_3[1]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = gaussiana(8,100,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 4
if($Arreglo_1[2]==0 || $Arreglo_2[2]==0 || $Arreglo_3[2]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[2],$Arreglo_2[2],$Arreglo_3[2]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = gaussiana(8,100,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 5
if($Arreglo_1[2]==0 || $Arreglo_2[2]==0 || $Arreglo_3[0]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[2],$Arreglo_2[2],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = triangular(50,65,85,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 6
if($Arreglo_1[1]==0 || $Arreglo_2[2]==0 || $Arreglo_3[2]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[1],$Arreglo_2[2],$Arreglo_3[2]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = gaussiana(8,100,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 7
if($Arreglo_1[0]==0 || $Arreglo_2[0]==0 || $Arreglo_3[2]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[0],$Arreglo_2[0],$Arreglo_3[2]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = trapezoidal(-37.5,-41.67,30,55,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 8
if($Arreglo_1[2]==0 || $Arreglo_2[1]==0 || $Arreglo_3[2]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[2],$Arreglo_2[1],$Arreglo_3[2]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = gaussiana(8,100,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 9
if($Arreglo_1[0]==0 || $Arreglo_2[2]==0 || $Arreglo_3[2]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[0],$Arreglo_2[2],$Arreglo_3[2]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = triangular(55,65,85,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 10
if($Arreglo_1[0]==0 || $Arreglo_2[1]==0 || $Arreglo_3[1]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[0],$Arreglo_2[0],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = trapezoidal(-37.5,-41.67,30,55,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 11
if($Arreglo_1[2]==0 || $Arreglo_2[2]==0 || $Arreglo_3[1]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[0],$Arreglo_2[0],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = gaussiana(8,100,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}
//REGLA 12
if($Arreglo_1[1]==0 || $Arreglo_2[0]==0 || $Arreglo_3[0]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[1],$Arreglo_2[0],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = trapezoidal(-37.5,-41.67,30,55,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }
  }
}


//REGLA 13
if($Arreglo_1[1]==0 || $Arreglo_2[1]==0 || $Arreglo_3[0]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[1],$Arreglo_2[1],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = triangular(50,65,85,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }

  }
}
//REGLA 14
if($Arreglo_1[0]==0 || $Arreglo_2[1]==0 || $Arreglo_3[2]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[1],$Arreglo_2[1],$Arreglo_3[0]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = triangular(50,65,85,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }

  }
}
//REGLA 15
if($Arreglo_1[1]==0 || $Arreglo_2[1]==0 || $Arreglo_3[1]==0 ){
  //LA REGLA NO APORTA
}
else{//Ninguno es cero
  $tope = min($Arreglo_1[1],$Arreglo_2[1],$Arreglo_3[1]);
  //echo $tope;
  
  for($x=0;$x<=100;$x++){
    $pertenencia = triangular(50,65,85,$x);
    if($pertenencia > $tope){
      $guardar = $tope;
    }
    else{
      $guardar = $pertenencia;
    }
    
    if($guardar > $arreglo_agregacion[$x]){
      $arreglo_agregacion[$x]=$guardar;
    }

  }
}
$num=0;
    $d=0;

  for ($x=0; $x <=100 ; $x++)
  { 
    $num=$num+($arreglo_agregacion[$x]*$x);
    $d=$d+$arreglo_agregacion[$x];
  }
    
    $CE=$num/$d;
    $CEN=round($CE,3);
    echo "<br>";
    echo "<center> <font size= '7'><br><br><br><br><br>CENTROIDE: $CEN<br><br><br><br></center>";

//COMPROBAR
  for($x=0;$x<=100;$x++){
    //echo $x." es ".$arreglo_agregacion[$x]."<br>";
  }

?>
</body>
</html>
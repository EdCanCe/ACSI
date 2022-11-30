function calorias(){  
  let resultado
  let calorias
  let edad=document.getElementById("ed").value;
  let altura=document.getElementById("al").value;
  let peso=document.getElementById("pe").value;
  let sexo = document.formu._datos.value;
 if(edad.length == 0){
  document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  else if(altura.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }

  else if(peso.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  
  switch(sexo){
    case "0":
      document.getElementById("txt").innerHTML = "Faltan datos";
    break;
    case "1":
      resultado=(10*peso)+(6.25*altura)-(5*edad)+5;
      break;
    case "2":
      resultado=(10*peso)+(6.25*altura)-(5*edad)-161;
      break;
  }
 calorias=resultado*1.2;
 calorias=parseInt(calorias);
 document.getElementById("txt").innerHTML ="Debes de consumir " +calorias+" calorías por día"
}

function calorias1(){ 
  let resultado
  let calorias
  let edad=document.getElementById("ed").value;
  let altura=document.getElementById("al").value;
  let peso=document.getElementById("pe").value;
  let sexo = document.formu._datos.value;
 if(edad.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  else if(altura.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
 
  else if(peso.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  
  switch(sexo){
    case "1":
      resultado=(10*peso)+(6.25*altura)-(5*edad)+5;
      break;
    case "2":
      resultado=(10*peso)+(6.25*altura)-(5*edad)-161;
      break;
  }
 calorias=resultado*1.375;
 calorias=parseInt(calorias);
 document.getElementById("txt").innerHTML ="Debes de consumir " +calorias+" calorías por día"
}

function calorias2(){ 
  let resultado
  let calorias
  let edad=document.getElementById("ed").value;
  let altura=document.getElementById("al").value;
  let peso=document.getElementById("pe").value;
  let sexo = document.formu._datos.value;
 if(edad.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  else if(altura.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }

  else if(peso.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  
  switch(sexo){
    case "1":
      resultado=(10*peso)+(6.25*altura)-(5*edad)+5;
      break;
    case "2":
      resultado=(10*peso)+(6.25*altura)-(5*edad)-161;
      break;
  }
 calorias=resultado*1.55;
 calorias=parseInt(calorias);
 document.getElementById("txt").innerHTML ="Debes de consumir " +calorias+" calorías por día"
}

function calorias3(){ 
  let resultado
  let calorias
  let edad=document.getElementById("ed").value;
  let altura=document.getElementById("al").value;
  let peso=document.getElementById("pe").value;
  let sexo = document.formu._datos.value;
 if(edad.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  else if(altura.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }

  else if(peso.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  
  switch(sexo){
    case "1":
      resultado=(10*peso)+(6.25*altura)-(5*edad)+5;
      break;
    case "2":
      resultado=(10*peso)+(6.25*altura)-(5*edad)-161;
      break;
  }
 calorias=resultado*1.725;
 calorias=parseInt(calorias);
 document.getElementById("txt").innerHTML ="Debes de consumir " +calorias+" calorías por día"
}

function calorias4(){ 
  let resultado
  let calorias
  let edad=document.getElementById("ed").value;
  let altura=document.getElementById("al").value;
  let peso=document.getElementById("pe").value;
  let sexo = document.formu._datos.value;
 if(edad.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  else if(altura.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }

  else if(peso.length == 0){
    document.getElementById("txt").innerHTML = "Faltan datos";
    return;
  }
  
  switch(sexo){
    case "1":
      resultado=(10*peso)+(6.25*altura)-(5*edad)+5;
      break;
    case "2":
      resultado=(10*peso)+(6.25*altura)-(5*edad)-161;
      break;
  }
 calorias=resultado*1.9;
 calorias=parseInt(calorias);
 document.getElementById("txt").innerHTML ="Debes de consumir " +calorias+" calorías por día"
}

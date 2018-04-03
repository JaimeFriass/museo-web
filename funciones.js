
var tabu = ["CACA","FEO","HORRIBLE","ABURRIDO"];
var sust = ["****","***","********","********"];


function cambiartabu(text1){
  var text=text1.toUpperCase();
  flen = tabu.length;
  for(i = 0; i < flen; i++){
    if(text == tabu[i])
      text.replace(/tabu[i]/g,sust[i]);//la g es para cada vez que salga la palabra
  }
}

function mostrarComentarios() {

  var e = document.getElementById("comentarios");
  e.hidden = false;
  var pos = -300; // Posicion right del div
  var id = setInterval(frame, 1); // Cada 1ms se llamara a la funcion FRAME
  
  function frame() {
    if (pos == 0) {   // Si se ha llegado a la posicion deseada
      clearInterval(id);  // Se termina la animación
    } else {
      pos = pos + 5;
      e.style.right = pos + 'px';   // Se modifica el atributo left del elemento
    }
  }
}

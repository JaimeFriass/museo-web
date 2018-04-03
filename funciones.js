
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
  e.style.right = pos;
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

function validarForm() {
  var nombre = document.forms["comentar"]["nombre"].value;
  var email = document.forms["comentar"]["e-mail"].value;
  var comentario = document.forms["comentar"]["mensaje"].value;

  if (nombre == '' || email == '' || comentario == '') {
    alert("Algo esta vacío");
  } else {
    // Si esta correcto el comentario se envia
    var fecha = new Date();
    var dia = fecha.getDate(); var mes = fecha.getMonth();
    var anio = fecha.getFullYear(); var hora = fecha.getHours();
    var minutos = fecha.getMinutes();

    var fecha_form = dia + "/" + mes + "/" + anio + " " + hora + ":" + minutos;

    var contenedor = document.getElementById("lista_comentarios");

    mensaje = cambiartabu(mensaje);
    contenedor.innerHTML += "<div class='mensaje'><p class='nombre_com'><b>"+nombre+"</b></p><p class='fecha_com' >"
                            +fecha_form +"</p><p>"+comentario+"</p></div>";

  }

  return false; // Para que no se actualice la pagina actual
}

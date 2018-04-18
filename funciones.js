
var tabu = ["imbecil","feo","horrible","aburrido", "tonto"];

function cambiartabu(text1){
  var text=text1.toUpperCase();
  flen = tabu.length;

  for(i = 0; i < flen; i++){

      var sust="";
      for(i = 0; i < tabu[i].length; i++)
        sust = sust + "*";

      text.replace(/tabu[i]/g,sust);//la g es para cada vez que salga la palabra
                                                                                                                                                                                                                          
   return text;
  }
}

function cambiarTabu2(frase_original) {
  var frase = frase_original.toUpperCase();
  n_letras = frase.length;
  console.log("Numero de letras: " + n_letras);

  var contador = 0;
  var salir = false;
  // Recorremos las palabras de la frase
  for (var i = 0; i < n_letras; i++) {
    console.log("Iteracion i: " + i + " Letra: " + frase[i]);
    var sustituir = "";
    // Recorremos las palabras tabu
    for (var j = 0; j < tabu.length; j++) {
      console.log("Recorriendo tabu: " + tabu[j]);
      var contador = 0;
      salir = false;
      var aux_i = i;
      // Recorremos la palabra tabu en cuestion
      for (var k = 0; salir == false; k++) {
        
        console.log("FRASE: " + frase[i] + " TABU: " + tabu[j][k]);
        if (frase[i] == tabu[j][k]) {
          salir = false;
          sustituir += "*";
          console.log("[X] Coinciden");
          i++;
          contador++;
        } else {
          salir = true; // Cambiamos de palabra
          i = aux_i;        
        }

        if (contador == tabu[j].length - 1) {
          console.log("MATCH");
          // Sustituimos para atrás la palabra por *
          for (var l = i; l != i - tabu[j].length && l != 0; l--) {
            console.log("Iteracion l: "+l+ " Letra sustituida: " + frase[l]);
            frase[l] = '*';
          }
          i = aux_i;
          console.log(" -> Cadena actual: "+frase);
          contador = 0;
        }
      }
    }
  }

  return frase;
}

function cambiarTabu3(frase_original) {
  var frase = frase_original.toLowerCase();
  var sustituir = "";
  var frase_nueva;
  for (var i = 0; i < tabu.length; i++) {
    if (frase.search(tabu[i]) != -1) {
      for (var j = 0; j < tabu[i].length; j++)
        sustituir += "*";
      frase = frase.replace(tabu[i], sustituir);
      console.log("Tabu: "+ tabu[i] + " por " + sustituir + " = " + frase);
      sustituir = "";
      i--;
    }
  }

  return frase;
}

function mostrarComentarios() {
  var e = document.getElementById("comentarios");
  var boton = document.getElementById("boton_comentarios");
  boton.hidden = true;
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

function ocultarComentarios() {
  var e = document.getElementById("comentarios");
  var boton = document.getElementById("boton_comentarios");
  boton.hidden = false;
  e.hidden = true;
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

    comentario = cambiarTabu3(comentario);
    contenedor.innerHTML += "<div class='mensaje'><p class='nombre_com'><b>"+nombre+"</b></p><p class='fecha_com' >"
                            +fecha_form +"</p><p>"+comentario+"</p></div>";

  }
  return false; // Para que no se actualice la pagina actual
}

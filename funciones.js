<script>
 
var tabu = ["CACA","FEO","HORRIBLE","ABURRIDO"];

function cambiartabu(text1){
  var text=text1.toUpperCase();
  flen = tabu.length;
  for(i = 0; i < flen; i++){
    if(text == tabu[i]){
      var sust="";
      for(i = 0; i < tabu[i].length; i++)
        sust = sust + "*";
      text.replace(/tabu[i]/g,sust);//la g es para cada vez que salga la palabra
    }

  }
}

</script>

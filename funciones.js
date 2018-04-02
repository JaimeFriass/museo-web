<script>
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



</script>

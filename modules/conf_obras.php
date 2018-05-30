<div id="obras" class="conf_obras">
    <h2><i class="fa fa-bookmark"></i> Edición de obras</h2>
    <script>

    </script>



    <form class="buscar_obra" method="post" action="panel.php#obras">
        <input oninput="buscarObraVisble(this.value)" type="text" name="obra" placeholder="Nombre de obra">
        <input type="submit" name="submit_obra" value="Buscar">
    </form>
    <div id="muestra_obras_visible"></div>
    <?php $div = 0;
    if (isset($_GET['o'])) {
        $div = $_GET['o'];
    }
    if ( isset($_POST['submit_obra'])) {
        $this->buscarObra( $_POST['obra']);
    }
    if(isset($_POST['submit_obra'])){
        $this->buscarObra( $_POST['obra']);
    }
    ?>
</div>
<div class="lista_obras">
<?php
    $this->mostrarObras($div); 
?>
</div>


  <div class="cover">
      <header>
          <img src="img/logo_header.png" />
          <h1>MUSEO ARQUEOLÓGICO</h1><h2>de Granada</h2>
          <input list='muestra_obras' oninput='buscaObra(this.value);' onselect="location = this.value;" id ="buscamosobra" type ="text" name ="busquedaobra" placeholder = "Buscar obra">
            <datalist id="muestra_obras">
            </datalist>
        
      </header>

    <div class="menu">


        <ul>
            <li ><a <?php if($menu_activo == 1) {?>class="active" <?php } ?> href="index.php">Inicio</a></li>
            <li><a <?php if($menu_activo == 2) {?>class="active" <?php } ?> href="">Obras</a></li>
            <li><a <?php if($menu_activo == 3) {?>class="active" <?php } ?> href="coleccion.php">Colecciones</a></li>
            <li><a href="">Horarios</a></li>
            <li class="login"><a href="panel.php"><i class="fa fa-user"></i></a></li>
        </ul>
    </div>
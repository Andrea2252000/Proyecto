<!--Confirmacion de borrar un campo-->
<?php
    function  borrar_todo(){
        echo '<script type="text/javascript"> ';
        echo ' function borrar_todo(borrar_t) {';
        echo '  if (confirm("¿Desea borrar este producto?")) {';
        echo '    document.location = borrar_t;';
        echo '  }';
        echo '}';
        echo '</script>';
    }
    ?>
    <?php
    borrar_todo();
    ?>

  <!--Confirmacion de editar un campo-->
  <?php
      function  editar_todo(){
        echo '<script type="text/javascript"> ';
        echo ' function editar_todo(editar_t) {';
        echo '  if (confirm("¿Desea editar este producto?")) {';
        echo '    document.location = editar_t;';
        echo '  }';
        echo '}';
        echo '</script>';
    }
    ?>
    <?php
    editar_todo();
    ?>
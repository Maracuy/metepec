<html>
<head>
   <meta charset="utf-8">
   <title>Mostrar Ventane Modal de forma Automático</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
</head>
<body>


<?php
if($_GET['TEST']){
  echo '
  <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
              <h3>Cabecera de la ventana</h3>
              </div>
              <div class="modal-body">
              <h4>Texto de la ventana</h4>
              Mas texto en la ventana.
              </div>
              <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
           </div>
           </div>
           </div>

           
           <script>
           $(document).ready(function()
           {
             $("#mostrarmodal").modal("show");
            });
            </script>
            ';
          }
            ?>
</body>
</html>
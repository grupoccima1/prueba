<?php include "./header.php"; 
require_once "./conecto.php";
?>


    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
      nuevo ticket
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            
        <form action="enviar.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Ticket</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Nombre: Juan Ramon Lira" required>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Elige tu archivo</label>
                <input type="file" class="form-control" name="file" id="file" placeholder="" aria-describedby="fileHelpId" required>
                <div id="fileHelpId" class="form-text">archivo</div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>

          </form>
        </div>
      </div>
    </div>
    

    <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Archivo</th>
          </tr>
        </thead>
        <tbody>
          <?php
        $selectinven="SELECT * FROM `archivos` WHERE 1";
              $result=mysqli_query($conexion,$selectinven);
              while($mostrar=mysqli_fetch_row($result)){?>
          <tr class="">
            <td> <?php echo $mostrar[0]?> </td>
            <td> <?php echo $mostrar[1]?> </td>
            <td><a href="<?php echo $mostrar[2]?>" download > <img src="add/file.png" alt=""> </a></td>
          </tr>
        </tbody>
        <?php
              }?>
      </table>
    </div>
    




    <script>
      var modalId = document.getElementById('modalId');
    
      modalId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');
    
        // Use above variables to manipulate the DOM
      });


      $(document).ready(function(){
    var table = $('#tabla').DataTable({
       orderCellsTop: true,
       fixedHeader: true 
    });

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabla thead tr').clone(true).appendTo( '#tabla thead' );

    $('#tabla thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Search...'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );   
});


    </script>
    
      <?php
    require_once "scripts.php"; ?> 
    


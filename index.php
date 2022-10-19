<?php
include 'conecto.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/1.css">
    <title>Prueba</title>
</head>
<body>
    <!-- Button trigger modal -->
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
            <button type="submint" class="btn btn-primary">Enviar</button>
          </div>

          </form>
        </div>
      </div>
    </div>
    

    <div class="table-responsive">
      <table class="table">
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
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php
	

      require 'DB.php';

      // Connected to DB
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		//print_r($_POST);
		//exit();
	      $conn = new DB();

	if ($_POST['tipo'] == 'todos') {

	    
	    $users = $conn->showInfo("SELECT P.login AS 'Extension', IF(VU.user is NULL,'LIBRE',VU.user) AS 'Usuario', IF(VU.user_group is NULL,'LIBRE', VU.user_group) AS 'Grupo' from vicidial_users VU RIGHT JOIN  phones P ON (VU.phone_login = P.login) ORDER BY P.login");
	}

	      if ($_POST['tipo'] == 'libres') {


	    $users = $conn->showInfo("SELECT P.login AS 'Extension', IF(VU.user is NULL,'LIBRE',VU.user) AS 'Usuario', IF(VU.user_group is NULL,'LIBRE', VU.user_group) AS 'Grupo' from vicidial_users VU RIGHT JOIN  phones P ON (VU.phone_login = P.login) WHERE VU.User IS NULL ORDER BY P.login");
	      
	      }
	      
      }




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Retro - Bootstrap Theme</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/bootstrap4-retro.min.css">
    
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Shrikhand" rel="stylesheet">
    
    
  </head>
  <body>

  <div class="bg-danger navbar-dark text-white">
    <div class="container">
      <nav class="navbar px-0 navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a href="index.php" class="pl-md-0 p-3 text-white">Inicio</a>
          </div>
        </div>
      </nav>

    </div>
  </div>


  
<div class="container py-5 mb5">
  <h1 class="mb-5">Usuarios y grupos</h1>

  <div class="row">
    <div class="col-md-3">
      <form method="post">
	<div class="form-group">
		<select class="custom-select d-block w-100" id="tipo" name="tipo" required>
             	   <option value="todos">Todos</option>
             	   <option value="libres">Libres</option>
	    </select>
	</div>
        <button type="submit" class="btn btn-primary" name="consultar">Mostrar</button>
      </form>
    </div>
    <div class="col-md-9">


      <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Grupo</th>
    </tr>
  </thead>
  <tbody>

  <?php if (isset($users)): ?>
    <?php foreach ($users as $user): ?>

    <tr>
      <th scope="row"><?= $user['Extension']; ?></th>
      <td><?= $user['Usuario']; ?></td>
      <td><?= $user['Grupo']; ?></td>
    </tr>
  <?php endforeach; ?>
  <?php endif; ?>
  
  </tbody>
</table>

    </div>
  </div>

</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>


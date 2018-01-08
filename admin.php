<?php
	//on fait appel au fichier de connexion 
	include('connexion.php');
	// on initialise une variable $msg qui va recevoir les messages insertion reussie ou les messages d'erreurs
	$msg="";
	//on verifie si l'utilisateur a bien cliquer sur le button valider
	if (isset($_POST['btnValider'])){
		// on insert les donnees provenant du formulaire dans la table categories 
		$sql= "INSERT INTO categories (libelle,description) VALUES ('".$_POST['libelle']."','".$_POST['description']."')";
		$result=mysqli_query($link	,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row"><!-- Menu -->

				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<a class="navbar-brand" href="#">MaDouce Creation</a>
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="#">Accueil</a>
							</li>
							<li>
								<a href="#">Contact</a>
							</li>

							<li>
								<a href="admin.php">Admin</a>
							</li>
							<li>
								<a href="articles.php">Articles</a>
							</li>
						</ul>
					</div>
				</nav>

			</div>

			<div class="row">

				<img src="img/img1.jpg" width="100%" height="250px">

			</div>
			<br>

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">

					<form action="" method="POST" role="form">
						<legend>Formulaire De Categories</legend>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Libelle</label>
							<input name="libelle" type="text" class="form-control" id="" placeholder="Entrer le libelle">
						</div>

						<div class="form-group">
							<label for="">Description</label>
							<input name="description" type="text" class="form-control" id="" placeholder="Description">
						</div>
						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
			<br>
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Libelle</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM categories";
							$res= mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)){?>
							<tr>
								<td> <?php echo $n; ?> </td>
								<td><?php echo $data['libelle']; ?></td>
								<td><?php echo $data['description']; ?></td>
								<td></td>
							</tr>
							<?php $n++;
						} ?>
					</tbody>
				</table>

			</div>
			

		</div>
		<a href="articles.php">Voir article</a>

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
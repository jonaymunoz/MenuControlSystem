<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #ABA3A3;
		}
	</style>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                   <?php
                   require 'database.php';
				   echo '<h2> MAIN MENU </h2>';
                   echo '<p> <a href="create.php" class="btn btn-success">Add</a><font></font> <p/>';
				    
                   $pdo = Database::connect();
                   echo '<table class="table table-bordered">';
                   echo '<tr>';
                   $sql = 'SELECT * FROM menu  WHERE idParentMenu = 1 ORDER BY idMenu';
                   foreach ($pdo->query($sql) as $row) {

                            echo '<th>';
                            echo $row['italiano'].'<br>';
                            echo '<a class="btn btn-xs btn-danger" href="delete.php?id='.$row['idMenu'].'"><span class="glyphicon glyphicon-remove"></span></a>';
                            echo '<a class="btn btn-xs btn-success" href="update.php?id='.$row['idMenu'].'"><span class="glyphicon glyphicon-pencil"></span></a>';
                            echo '<a class="btn btn-xs btn-info" href="clone.php?id='.$row['idMenu'].'"><span class="glyphicon glyphicon-plus"></span></a>';
                            echo '</th>';
                   }
                   echo '</tr>';
                   echo '<tr>';
                    $sql = 'SELECT * FROM menu  WHERE idParentMenu = 1 ORDER BY idMenu';
                   foreach ($pdo->query($sql) as $row1) {

                            $sql = 'SELECT * FROM menu  Where idParentMenu = '. $row1['idMenu'];
                            echo '<td>';
                            echo '<ul>';
                            foreach ($pdo->query($sql) as $parent) {
                              
                           
                            echo '<li>';


                            echo $parent['italiano'].'<br>';
                            echo '<a class="btn btn-danger btn-xs" href="delete.php?id='.$parent['idMenu'].'"><span class="glyphicon glyphicon-remove"></span></a>';
                            echo '<a class="btn btn-xs btn-success" href="update.php?id='.$parent['idMenu'].'"><span class="glyphicon glyphicon-pencil"></span></a>';
                            //echo '<a class="btn btn-sm btn-info" href="clone.php?id='.$parent['idMenu'].'"><span class="glyphicon glyphicon-plus"></span></a>';
                            $sql = 'SELECT * FROM menu  Where idParentMenu = '. $parent['idMenu'];
                            echo '<ul>';
                            foreach ($pdo->query($sql) as $parent2) {
                               echo '<li>';
                                echo $parent2['italiano'].'<br>';
                                echo '<a class="btn btn-danger btn-xs" href="delete.php?id='.$parent2['idMenu'].'"><span class="glyphicon glyphicon-remove"></span></a>';
                                echo '<a class="btn btn-xs btn-success" href="update.php?id='.$parent2['idMenu'].'"><span class="glyphicon glyphicon-pencil"></span></a>';
                                //echo '<a class="btn btn-sm btn-info" href="clone.php?id='.$parent2['idMenu'].'"><span class="glyphicon glyphicon-plus"></span></a>';
                               echo '</li>';

                            }
                            echo '</ul>';
                            echo '</li>';
                             }
                             echo '</ul>';
                             echo '</td>';
                            
                   }
                   echo '</tr>'
                            
							?>
							<?php
						
                   Database::disconnect();
                   echo '</table>';
                   
                  ?>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
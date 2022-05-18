<?php
include_once 'config/database.php';

if(isset($_POST['addData']))
{

    $sql = "INSERT INTO users (full_name, numero, sexe, type, motif, date_added, date_out) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss",$pickup, $dropoff, $sexe, $type, $motif, $travelDate, $returnDate);
     
			$pickup = $_POST['name'];
			$dropoff = $_POST['numero'];
			$sexe = $_POST['sexe'];
			$type = $_POST['type'];
			$motif = $_POST['motif'];
			$travelDate= date('Y-m-d', strtotime($_POST['date_deb']));
			$returnDate= date('Y-m-d', strtotime($_POST['date_fin']));

			if(mysqli_stmt_execute($stmt)){
                echo '<script> alert("تمت إضافة البيانات بنجاح"); </script>';
														?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
			} else{
                echo '<script> alert("لا يمكن إضافة البيانات"); </script>';
				?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
		            }
		        // Close statement
		        mysqli_stmt_close($stmt);
		}

?>
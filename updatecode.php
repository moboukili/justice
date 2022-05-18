<?php
include_once 'config/database.php';

if(isset($_POST['updatedata']))
{
        $id = $_POST['update_id'];
    
            $pickup = $_POST['name'];
			$dropoff = $_POST['numeo'];
			$motif = $_POST['motif'];
			$travelDate= date('Y-m-d', strtotime($_POST['date_deb']));
			$returnDate= date('Y-m-d', strtotime($_POST['date_fin']));

            $query = "UPDATE users SET full_name='$pickup', numero='$dropoff', motif='$motif', date_added=' $travelDate', date_out=' $returnDate' WHERE id='$id'  ";
            $query_run = mysqli_query($conn, $query);


			if($query_run){
                echo '<script> alert("تم تحديث البيانات بنجاح"); </script>';
				?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
			} else{
                echo '<script> alert("لا يمكن تحديث البيانات"); </script>';
				?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
		            }
		        // Close statement
		}

?>
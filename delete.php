<?php

include_once 'config/database.php';

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("حذف البيانات بنجاح "); </script>';
        ?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
    }
    else
    {
        echo '<script> alert("لا يمكن حذف البيانات "); </script>';
		?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
    }
}

?>
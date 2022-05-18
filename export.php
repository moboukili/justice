<?php  

include_once 'config/database.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM users ORDER BY id";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>  
                         <th>Le Nom Complet</th>  
                         <th>Le numero de dossier</th>  
                        <th>Date Debut detention</th>
                        <th>Date fin detention</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["full_name"].'</td>  
                         <td>'.$row["numero"].'</td>  
                        <td>'.$row["date_added"].'</td>  
                        <td>'.$row["date_out"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
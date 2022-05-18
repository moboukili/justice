<?php 

include_once 'config/database.php';
	 
 $sql = "SELECT * FROM users ORDER BY id "; 
 $result = mysqli_query($conn, $sql);  
?>


<!DOCTYPE html>
<html lang="ar">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>لوحة القيادة من العدل</title>
<link rel="shortcut icon" href="assets/car.ico" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

.success {
    background-color: #ddffdd;
    border-right: 6px solid #4CAF50; 
}
	input[type="radio"] {
    display:inline-block;
    width:19px;
    height:19px;
    margin:-1px 4px 0 0;
    vertical-align:middle;
    background:url(http://webdesigntutsplus.s3.amazonaws.com/tuts/391_checkboxes/check_radio_sheet.png) -38px top no-repeat;
    cursor:pointer;
}

input[type="radio"] + label {
    font-size:14px;
	margin-right: 35px;
}


input[type="radio"]:checked {
    background:url(http://webdesigntutsplus.s3.amazonaws.com/tuts/391_checkboxes/check_radio_sheet.png) -57px top no-repeat;
}
</style> 

</head>
<body>
<header>
    <div class="row">
        <div class="col">
          <div class="text-centers" style="background-image: url('assets/banner.jpeg');"></div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="assets/1.jpg" width="30" height="30" alt="" style="margin-left: 15px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#" >لوحة القيادة <span class="sr-only"></span></a>
            </li>
      
          </ul>
        </div>
      </nav>
      
</header>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>تدبير <b> ملفات التحقيق</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> 								<span>إضافة ملف</span></a>
						<form action="export.php" method="POST">
                        <input type="submit" name="export" class="btn btn-info" value="Excel تحويل الى ">
                        </form>
                    </div>
				</div>
                
			</div>
            <br>
			<table id="example" class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>الرقم الترتيبي</th>
                        <th>الاسم الكامل</th>
						<th>رقم الملف</th>
						<th>الجنس</th>
						<th>النوع</th>  
						<th>متهم ب</th>
                        <th>تاريخ الاعتقال</th>
                        <th>تاريخ انتهاء الاعتقال</th>
                        <th>إجراءات</th>
                    </tr>
				</thead>
				<tbody>
					<?php 
									if(mysqli_num_rows($result) > 0)  
			                          {  
			                             while($row = mysqli_fetch_array($result))  
			                             {  
			                             	$idr = $row['id'];
                                             $varTaskDue = $row['date_out'];
											 $curdate = date('Y-m-d');
											 if ($varTaskDue == $curdate) {
												 $txt2 = $row["full_name"];
												echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
												؟ أو تمديد بشهرين إثنين؟ " . $txt2 . " إنهاء الإعتقال الإحتياطي للمتهم
												<br><br>
												<center>
												<form action='' method='POST'>
												<input type='submit' name='show_botton' class='btn btn-danger' value='تمديد'>
												<input type='submit' name='sorti_botton' class='btn btn-success' value='إنهاء الإعتقال'>
												</form></center>
												<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												  <span aria-hidden='true'>&times;</span>
												</button>
											  </div>";
											 }
											if(isset($_POST['show_botton']) && ($varTaskDue == $curdate)) { 
											
												$id = $row["id"];

												$returnDate = date("Y-m-d",strtotime("+2 month",strtotime(date("Y-m-d",strtotime("now") ) )));

												$query = "UPDATE users SET date_out=' $returnDate' WHERE id='$id'  ";
												$query_run = mysqli_query($conn, $query);


													if($query_run){
														echo '<script> alert(" تم اضافة شهرين للمحتجز"); </script>';

														?>
															<script type="text/javascript">
															window.location.href = 'https://oujda.xyz/dash_board.php';
															</script>
														<?php
													} else{
														echo '<script> alert("Les Données non mises à jour"); </script>';
													}
														// Close statement
												}
			                          ?>
								  <tr style="color:<?php if(isset($_POST['sorti_botton']) && ($varTaskDue == $curdate)) {
								  echo "green";
								  }
								  elseif($varTaskDue == $curdate){
									echo "red";  
								  }
								  else{
									  echo "";
								  }?>" >
                                   <td><?php echo $row["id"];?></td>
						           <td><?php echo $row["full_name"];?></td>
								   <td><?php echo $row["numero"];?> </td>
								   <td><?php echo $row["sexe"];?></td>
								   <td><?php echo $row["type"];?></td>
								   <td ><?php echo $row["motif"];?> </td>
	                               <td><?php echo $row["date_added"];?> </td>
	                               <td><?php echo $row["date_out"];?></td>  

						           <td>
									<a href="#editEmployeeModal" class="editbtn" data-toggle="modal"><i class="material-icons" data-												toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a href="#deleteEmployeeModal" class="deletebtn " data-toggle="modal"><i class="material-icons " data-											toggle="tooltip" title="Delete">&#xE872;</i></a>
								    <a href="print.php?id=<?= $idr; ?>" target="_blank" ><i class="material-icons" data-toggle="tooltip" title="Print">&#xe8ad;										</i></a>
							
								</td>
							</tr>
    
						          <?php  
                                                      
                               		}  
		                          }  
		                          ?>
					
				</tbody>
			</table>
			
		</div>
	</div> 
			<div class="row">
                <div class="copy-right">
                    <p>Réalisé par : <a href="https://seomaniak.ma"  title="Seomaniak" target="_blank">Seomaniak.ma</a></p>
                </div>
            </div>
</div>
<!-- add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="insertCode.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">إضافة محتجز </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>الاسم الكامل <span style="color: red;">(*)</span></label>
						<input type="text" name="name" placeholder="إسم المحتجز" class="form-control" required oninvalid="this.setCustomValidity('أدخل الاسم هنا')"
    									oninput="this.setCustomValidity('')">
					</div>
					<div class="form-group">
						<label>رقم الملف <span style="color: red;">(*)</span></label>
						<input type="text" name="numero" placeholder="رقم الملف" class="form-control" required oninvalid="this.setCustomValidity('أدخل الرقم هنا')"
    									oninput="this.setCustomValidity('')">
					</div>	
					<div class="form-group">
						<label>الجنس <span style="color: red;">(*)</span></label>
						<br>
						<input type="radio" id="sexe1" class="form-control" required oninvalid="this.setCustomValidity('أدخل الجنس هنا')"    									oninput="this.setCustomValidity('')" name="sexe" value="ذكر">
						<label for="sexe1">ذكر</label>

						<input type="radio" id="sexe2" class="form-control" name="sexe" value="أنثى">
						<label for="sexe2">أنثى</label>
					</div>
					<div class="form-group">
						<label>النوع <span style="color: red;">(*)</span></label>
						<br>
						<input type="radio" id="type1" class="form-control"  name="type" value="أحداث">
						<label for="type1">أحداث</label>

						<input type="radio" id="type2" class="form-control" required oninvalid="this.setCustomValidity('أدخل النوع هنا')"    									oninput="this.setCustomValidity('')" name="type" value="رشداء">
						<label for="type2">رشداء</label>
					</div>
					<div class="form-group">
						<label>متهم ب <span style="color: red;">(*)</span></label>
						<input type="text" name="motif" placeholder="متهم ب" class="form-control" required oninvalid="this.setCustomValidity('أدخل اتهامات هنا')"
    									oninput="this.setCustomValidity('')">
					</div>
					<div class="form-group">
						<label>تاريخ الاعتقال <span style="color: red;">(*)</span></label>
                        <input type="text" name="date_deb" class="form-control" onfocus="(this.type = 'date')" placeholder="2021/07/22" required oninvalid="this.setCustomValidity('أدخل احتجاز التاريخ هنا')"
    									oninput="this.setCustomValidity('')">
					</div>
					<div class="form-group">
						<label>تاريخ انتهاء الاعتقال <span style="color: red;">(*)</span></label>
                        <input type="text" name="date_fin" class="form-control" onfocus="(this.type = 'date')" placeholder="2022/03/10" required oninvalid="this.setCustomValidity('أدخل احتجاز تاريخ الانتهاء هنا')"
    									oninput="this.setCustomValidity('')">
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="إلغاء">
					<input type="submit" name="addData" class="btn btn-success" value="إضافة">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editmodal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
        <form action="updatecode.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">تغيير معلومات المحتجز</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                <input type="hidden" name="update_id" id="update_id">				
					<div class="form-group">
						<label>الاسم الكامل</label>
						<input type="text" name="name" id="name" class="form-control" >
					</div>
					<div class="form-group">
						<label>رقم الملف</label>
						<input type="text" name="numeo" id="numeo" class="form-control" >
					</div>
					<div class="form-group">
						<label>الجنس</label>
						<br>
						<input type="radio" id="radiosexe1" class="form-control" name="sexe" value="ذكر">
						<label for="radiosexe1">ذكر</label>

						<input type="radio" id="radiosexe2" class="form-control" name="sexe" value="أنثى">
						<label for="radiosexe2">أنثى</label>
					</div>
					<div class="form-group">
						<label>النوع</label>
						<br>
						<input type="radio" id="radiotype1" class="form-control" name="type" value="أحداث">
						<label for="radiotype1">أحداث</label>

						<input type="radio" id="radiotype2" class="form-control" name="type" value="رشداء">
						<label for="radiotype2">رشداء</label>
					</div>
					<div class="form-group">
						<label>متهم ب</label>
						<input type="text" name="motif" id="motif" class="form-control" >
					</div>
					<div class="form-group">
						<label>تاريخ الاعتقال</label>
						<input type="text" name="date_deb" id="date_deb" class="form-control" >
					</div>
					<div class="form-group">
						<label>تاريخ انتهاء الاعتقال</label>
						<input type="text" name="date_fin" id="date_fin" class="form-control" >
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="إلغاء">
					<input type="submit"  name="updatedata" class="btn btn-info" value="حفظ">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deletemodal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
        <form action="delete.php" method="post">
				<div class="modal-header">	
                    <input type="hidden" name="delete_id" id="delete_id">						
					<h4 class="modal-title">حذف محتجز</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>هل أنت متأكد أنك تريد حذف هذا المحتجز؟</p>
					<p class="text-warning"><small>لا يمكن إلغاء هذا الإجراء.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="إلغاء">
					<input type="submit" name="deletedata" class="btn btn-danger" value="حذف">
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

				
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                
				console.log(data);
				$('#update_id').val(data[0]);
                $('#name').val(data[1]);
                $('#numeo').val(data[2]);
				$('input[name="sexe"]:checked').val(data[3]);
				$('input[name="type"]:checked').val(data[4]);
				$('#motif').val(data[5]);
                $('#date_deb').val(data[6]);
                $('#date_fin').val(data[7]);
            });
        });
    </script>
	<script type="text/javascript">
		$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
showNotification();

function showNotification() {
  $(".success")
    .fadeIn()
    .css({ right: 150, position: "absolute" })
    .animate( 5000, function(){
		location.reload(1)
});
}
</script>
    
</body>
</html>
<?php
 
	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Décision de prolonger la période de détention provisoire");   
    $pdf->SetFont('freeserif','',13);
    $pdf->AddPage();  
    $content = ''; 
	$idride=$_GET['id'];
			include_once 'config/database.php';
			 $sql = "SELECT * FROM users WHERE id = '$idride' "; 
			 $query = $conn->query($sql);
			 while($row = $query->fetch_assoc()){ 
    $content .= '

	<div align="center">
	<img src="ff.jpg"></div>
	<div align="center" style="font-weight: bold;font-size:23px;" > قرار بتمديد فترة الاعتقال الاحتياطي</div>
	<div align="center" >(المواد 176-177-373-386 من قانون المسطرة الجنائية)</div>
	<div align="center" style="text-decoration: underline;font-size:17px;" >باسم جلالة الملك</div>
	<br><br>
	<div style="text-align: right;font-size:15px;margin-right: 30px;" >نحن محمد الطاوس المستشار المكلف بالتحقيق بالغرفة الثانية لدى محكمة الاستئناف بوجـدة.</div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >نظرا لملتمس النيابة العامة المؤرخ في : </div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >و نظرا لمستندات البحث الجاري ضد المسمى : '. $row["full_name"]."&ensp;&ensp; رقم الملف : ". utf8_decode($row["numero"]).'</div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >المتهم بـ : '. $row["motif"].'</div>
	<div style="text-decoration: underline;font-size:13px;text-align: right;margin-right: 30px;" >و نظرا للمواد 176- أو 177- 373 من قانون المسطرة الجنائية.</div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >- وحيث أن المتهم أعلاه اعتقل بتاريخ : '. utf8_decode($row["date_added"]).'</div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >- وحيث انه قد سبق تمديد فترة اعتقاله لمدة شهرين بتاريخ :  '. utf8_decode($row["date_added"]).'</div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >- و حيث أن فترة الاعتقال الاحتياطي تنتهي بتاريخ : '. utf8_decode($row["date_out"]).'</div>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >- و حيث أن إجراءات التحقيق لم تنته بعد في حق المتهم.</div>
	<br>
	<div align="center" style="text-decoration: underline;font-size:18px;" >لأجـــــــله</div>
	<br>
	<div style="text-align: right;font-size:13px;margin-right: 30px;" >نقرر تمديد فترة اعتقال المسمى : '. $row["full_name"].' </div>
	<div style="text-align: right;font-weight: bold;font-size:14px;margin-right: 30px;" >لمدة شهرين اثنين ابتداء من تاريخه.</div>
	<br>
	<div style="text-align: left;font-weight: bold;font-size:15px;" >حرر بوجدة بتاريخ : '. date("Y-m-d ").'</div>
	<div style="text-align: left;font-weight: bold;font-size:15px;" >المستشار المكلف بالتحقيـق</div>
	  
      '; 
	}
    $pdf->writeHTML($content);  
	ob_end_clean();
	$pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'Fichier_'.date('d-M-Y').'.pdf', 'FI');
	return true;
 
 
?>

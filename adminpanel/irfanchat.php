<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{
	
		
	?>
	

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		

	<h2 class="title">All User Inbox's</h2>
	
    
	<?php 
		//$user_id = $_SESSION['id'];
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json",
			"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
		);

		$data = array();

		$ch = curl_init( $firebaseDb_URL.'chat/.json' );

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$return = curl_exec($ch);

		$json_data = json_decode($return, true);
		?><pre><?php
	   //print_r($json_data);
?></pre><?php
//echo key($json_data);



foreach($json_data as $key=>$value){
    
   //echo $key.'<br>';
    $unique_keys = array_unique(array_map(function ($key) {
  $parts = explode('-', $key);
  sort($parts);
  return implode('-', $parts);
}, array_keys($json_data)));
$i = 0;
foreach($unique_keys as $uni){
    
   if (array_key_exists($i, $unique_keys)) {
       
       	?><pre><?php
       	echo "key is".$unique_keys[$i];
print_r($json_data[$unique_keys[$i]]).'<br>';
       $i++;
?></pre><?php
       
       
   }
} 
    
}

		$curl_error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		//echo $json_data['code'];
		//die;
	
		?>
			<div style="clear:both"></div>
		<?php

		curl_close($ch);
	?>

	

<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>
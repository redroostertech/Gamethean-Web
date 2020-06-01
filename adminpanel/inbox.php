<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{
	
		
	?>
	

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCrWyFsut4g-999p9yW8Rqhnqwuuoj0iyA",
    authDomain: "gamethean-77994.firebaseapp.com",
    databaseURL: "https://gamethean-77994.firebaseio.com",
    projectId: "gamethean-77994",
    storageBucket: "gamethean-77994.appspot.com",
    messagingSenderId: "414146890277",
    appId: "1:414146890277:web:3cbd9acd981b59c1aa8dcc",
    measurementId: "G-5SL0QXX2SF"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

	<h2 class="title">All User Inbox's</h2>
	
    
	<?php 
		//$user_id = $_SESSION['id'];
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json",
			"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
		);

		$data = array();

		$ch = curl_init( $firebaseDb_URL.'Inbox/.json' );

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$return = curl_exec($ch);

		$json_data = json_decode($return, true);
	    //var_dump($json_data);

		$curl_error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		//echo $json_data['code'];
		//die;
		$get_inbox_name="";
        foreach( $json_data as $str => $val ) 
        {
            $get_inbox_name.=$str.","; 
        }
        $final=$get_inbox_name."0";
        $get_inbox_name=$final;
       
        
        //fetch name of user for showing inbox
    		$data = array("fb_id" => $get_inbox_name);
    		
    		$ch2 = curl_init( $baseurl.'get_profiles_nameByID' );
    
    		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');
    		curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data));
    		curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
    
    		$return1 = curl_exec($ch2);
    
    		$json_data1 = json_decode($return1, true);
    	    //var_dump($json_data1);
    
    		$curl_error = curl_error($ch2);
    		$http_code = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
    		
         //fetch name of user for showing inbox
        
        $i="0";
		foreach( $json_data as $str => $val ) 
		{	
		   
		  $indexCount=$i++; 
		  //  print_r($str);
		  //  echo"<br>";
		  //  print_r($val);
		    
		    
		    
		    $fb_idd=$json_data1['msg'][$indexCount]['fb_id'];
		    $name=$json_data1['msg'][$indexCount]['first_name'].' '.$json_data1['msg'][$indexCount]['last_name'];
		    
		    
		    $singleUserId="";
		    foreach( $val as $str1 => $val1 ) 
		    {
		       $singleUserId.=$str1.','; 
		        
		    }
		    $result=$singleUserId.'0';
		    $singleUserId=$result;
		   
			?>
				<div onclick="fetch_name('<?php echo $str;?>','<?php echo $singleUserId; ?>')" style="background:white; width:220px; margin-right:10px; float:left; text-align:center; margin-bottom:10px; border-radius: 5px; padding: 20px 0 20px 0;">
					<img src="https://graph.facebook.com/<?php echo $str;?>/picture?type=normal" style="border-radius: 50%; width:80px; height:80px; border: solid 4px #F2F2F2;">
					<h3 style="font-weight: 400;">
					    <?php
					     
					    ?>
					</h3>
				</div>
			<?php	
		}
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

<?
     
	//API Url to send the reuest
	$url = 'http://localhost/iStorage/apiServer.php';

	// User data request
	$data = array('username'=>'jahanvib','title'=>'Mrs','FirstName'=>'Jahanvi','MiddleInitials'=>'J','LastName'=>'Badiyani','Gender'=>'F','DOB'=>'1984-07-15','entity'=>'user');

	//Initialising Curl
	$ch = curl_init( $url );

	# Setup request to send json via POST.
	$payload = json_encode( array( $data ) );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	# Return response.
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	# Send request.
	$result = curl_exec($ch);
	curl_close($ch);
	# Print response.
	echo "<pre>$result</pre>";
 ?>
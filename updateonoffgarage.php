<?php






include "connect.php";
// $db = mysqli_connect('localhost','adminroot','1234','db_crna');

if(!$con)
{
	echo "Database connection failed";
}


    // $sqlcusid = "SELECT * FROM `members` ORDER BY memid DESC LIMIT 0,1";
	// $all_sqlcusid = mysqli_query($con,$sqlcusid);

	// while ($sqlcusid = mysqli_fetch_array(
    //     $all_sqlcusid,MYSQLI_ASSOC)):;
    //     $memcusid = $sqlcusid["memid"];
    //     $memcusid = $memcusid+1;
    // endwhile;


$memid = $_POST['memid'];
$status = $_POST['status'];
$garageid = $_POST['garageid'];

$date = date('Y-m-d H:i:s');
$level = "1";
$profile = "http://dik-it.com/crna-img/custommer/dedult.png";

$sql = "SELECT memusername FROM members WHERE memid = '".$memid."'";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
if($count == 1){
	echo json_encode("Error");
}else{
	$insert = "UPDATE garage SET garageonoff = '$status' WHERE garageid = '$garageid')";
	// $insert1 = "INSERT INTO custumer(cusfullname,custel,memid) VALUES ('".$fullname."','".$tel."','".$memcusid."')";
		$query = mysqli_query($con,$insert);
		if($query){
			echo json_encode("Success");
		}
}






// require "connect.php";

// $action = $_POST['action'];

// if ($action == 'update_onoof_status') {
//     $status = $_POST['status'];
//     $garageid = $_POST['garageid'];
    
//     $update_query = "UPDATE garage SET garageonoff = '$status' WHERE garageid = '$garageid'";
//     $update_result = mysqli_query($con, $update_query);
    
//     if ($update_result) {
//         $response = array(
//             'status' => 'success',
//         );
//     } else {
//         $response = array(
//             'status' => 'error',
//         );
//     }
    
//     echo json_encode($response);
// }

?>

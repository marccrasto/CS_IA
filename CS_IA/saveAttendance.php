<?php
include 'conn.php';
if(isset($_POST['takeAttendance'])){

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "db_cs");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

print_r($_POST);
//$_POST['RecordsCount']

for($i=1; $i<=$_POST['RecordsCount']; $i++){

	$UserID = $_POST['UserID'.$i];
	$AttendenceID = $_POST['attendance'.$i];

	if($UserID <> "" && $AttendenceID <> ""){

	if($AttendenceID == '1'){
		$absentORpresent = 'Days_Present';
	}else{
		$absentORpresent = 'Days_Absent';
	}


    $query = "SELECT Student_ID, Total_Number_Days, ".$absentORpresent." FROM tbl_take_attendance where Student_ID = ".$UserID;

	//echo $query ;
	$filter_Result = mysqli_query($conn, $query);


 
	
	while($row=mysqli_fetch_array($filter_Result)){
	
	$absORpreValue = $row[$absentORpresent] + 1;
	$TotalNumDays = $row['Total_Number_Days'] + 1;
	}
    
	//echo "<br/>";
    $c_update="update tbl_take_attendance set ".$absentORpresent. "='".$absORpreValue."', Total_Number_Days = ".$TotalNumDays." where Student_ID = ".$UserID;

	
	//echo $c_update."<br/>";

    $run_update=mysqli_query($conn, $c_update);



               //  while($row = mysqli_fetch_array($search_result))	


	}// End If Condition

}//End For loop

if($run_update){
header('Location: Take Attendance.php?updated=Success');
}




}







?>
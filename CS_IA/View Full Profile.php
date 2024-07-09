<?php
include 'conn.php';
    if(isset($_POST['update'])){

    $user_id=$_POST['user_id'];


	$txtname = $_POST['txtname'];
	$txtmailid = $_POST['txtmailid'];
	$txtgender = $_POST['txtgender'];
	$txtmobile = $_POST['txtmobile'];
	$txtcity = $_POST['txtcity'];
	$txtstate = $_POST['txtstate'];
	$txtcountry = $_POST['txtcountry'];
	$txtdepartment = $_POST['txtdepartment'];
	$txtcourse = $_POST['txtcourse'];
	$txtyear = $_POST['txtyear'];

$c_image= $_FILES['userImage']['name'];
$c_image_temp=$_FILES['userImage']['tmp_name'];

$uploadImageName = "upload/".$c_image;



if($c_image_temp != "")
{
    move_uploaded_file($c_image_temp , "upload/$c_image");

    $c_update="update tbl_registration set Name='$txtname', Mail_ID='$txtmailid', Gender='$txtgender',  Mobile= '$txtmobile',  City= '$txtcity',  State= '$txtstate',  Country= '$txtcountry',  Department= '$txtdepartment',  Course= '$txtcourse',  Year= '$txtyear', img_location='$uploadImageName' where ID='$user_id'";   
}else
{
    $c_update="update tbl_registration set Name='$txtname', Mail_ID='$txtmailid', Gender='$txtgender',  Mobile= '$txtmobile',  City= '$txtcity',  State= '$txtstate',  Country= '$txtcountry',  Department= '$txtdepartment',  Course= '$txtcourse',  Year= '$txtyear' where ID='$user_id'"; 
}

$run_update=mysqli_query($conn, $c_update);



    if($run_update){

       // echo"<script>alert('Your Account has been Updated successfully, Thanks')</script>";
               // echo"<script>window.open('my_account.php','_self')</script>";  
			   
			  header('Location: View Full Profile.php?updated=Success&&uid='.$_POST['user_id']);
    }




  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
th, td {
  text-align: left;
  padding: 16px;
}


	select {
        width:100%;
    }
body 
	.header {
  padding: 80px;
  text-align: center;
  background: #FF0000;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}
.navbar {
    overflow: hidden;
    background-color: #333;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    text-align: center;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
    text-align: right;
}

/* Active/current link */
.navbar a.active {
  background-color: #0EA014 ;
  color: white;
}
	{
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=select] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=select] {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
body,td,th {
    font-size: 24px;
    text-align: center;
}
</style>
</head>
<body>
	<?php
	
	$ret=mysqli_query($conn,"SELECT * FROM `tbl_registration` WHERE ID='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  {?>




	<div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
    </div>
<div class="navbar">
 <a href="Staff Homepage.php" class="active">Home</a>
  <a href="View Students.php">View Students</a>
  <a href="Take Attendance.php">Take Attendance</a>
  <a href="Staff Login.php" class="right">Logout</a>
	<a href="View Student Attendance.php" class="right">View Student Attendance</a>
</div>
<p>&nbsp;</p>
<div class="container">
<div class="center wow fadeInDown">

<?php if(isset($_GET['updated'])){?>

<div class="alert alert-success" style="color: green;">
  <strong>Success!</strong> Profile Updated.
</div>
<?php }?>

                 <h1>Student Profile</h1>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

			<form action="" method="post" enctype="multipart/form-data" id="myForm" >
           <table width="375" height="277" border="1" align="center">
             <tbody>
               <tr>
                 <td height="64">Profile Picture</td>
               </tr>
               <tr>
                 <td>
				 <input type="file" name="userImage"><br><br>
				 <strong><img src="<?php echo $row['img_location']; ?>" width="374" height="262"></strong></td>
               </tr>
             </tbody>
           </table>
             <div class="table-responsive">
               <div class="col-md-8">
                 <h2>Student Information</h2>
               </div>
             </div>
	 
           <table width="100%" border="1">
             <tbody>
               <tr>
                 <td width="276">ID</td>
                 <td width="527"><input value="<?php echo $row['ID'];?>" name="txtid" type="text"  ></td>
               </tr>
               <tr>
                 <td>Name</td>
                 <td><input value="<?php echo $row['Name'];?>" name="txtname" type="text"  ></td>
               </tr>
               <tr>
                 <td>Mail_ID</td>
                 <td><input value="<?php echo $row['Mail_ID'];?>" name="txtmailid" type="text"  ></td>
               </tr>
               <tr>
                 <td>Gender</td>
                 <td><input value="<?php echo $row['Gender'];?>" name="txtgender" type="text"  ></td>
               </tr>
               <tr>
                 <td>Mobile</td>
                 <td><input value="<?php echo $row['Mobile'];?>" name="txtmobile" type="text"  ></td>
               </tr>
               <tr>
                 <td>City</td>
                 <td><input value="<?php echo $row['City'];?>" name="txtcity" type="text"  ></td>
               </tr>
               <tr>
                 <td>State</td>
                 <td><input value="<?php echo $row['State'];?>" name="txtstate" type="text"  ></td>
               </tr>
               <tr>
                 <td>Country</td>
                 <td><input value="<?php echo $row['Country'];?>" name="txtcountry" type="text"  ></td>
               </tr>
               <tr>
                 <td>Department</td>
                 <td><input value="<?php echo $row['Department'];?>" name="txtdepartment" type="text"  ></td>
               </tr>
               <tr>
                 <td>Course</td>
               <td><input value="<?php echo $row['Course'];?>" name="txtcourse" type="text"  ></tr>
               <tr>
                 <td>Year</td>
                 <td><input value="<?php echo $row['Year'];?>" name="txtyear" type="text"  ></td>
               </tr>
               <tr>
                 
                 <td colspan="2">
				 <input type="hidden" name="user_id" value="<?php echo $_GET['uid'];?>">
				 <button type="submit" class="registerbtn" name="update">Update Profile</button></td>
               </tr>
             </tbody>
           </table>
		   </form>
 <?php } ?>
	
	
	
	
</body>
</html>

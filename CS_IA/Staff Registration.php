<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
}
</style>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>
<body onSubmit="MM_validateForm('txtname','','R');MM_validateForm('txtmailid','','RisEmail');MM_validateForm('txtmobile','','NisNum');return document.MM_returnValue">

	<?php
		
	include('conn.php');
	$q2="select * from tbl_state";
	$r2=mysqli_query($conn,$q2);
	function getPosts()
	  {
		  $posts = array();
		  $posts[1] = $_POST['txtname'];
		  $posts[2] = $_POST['txtmailid'];
		  $posts[3] = $_POST['txtgender'];
		  $posts[4] = $_POST['txtmobile'];
		  $posts[5] = $_POST['txtcity'];
		  $posts[6] = $_POST['txtstate'];
		  $posts[7] = $_POST['txtcountry'];
		  $posts[8] = $_POST['txtdepartment'];
		  $posts[9] = $_POST['txtpassword'];
		  $posts[10] = $_POST['txtconfirm'];
		  $posts[11] = $_POST['image'];
	return $posts;
	}
  
		if(isset($_POST['registerbtn']))	
		{
			$data = getPosts();
			
			if($data[9]==$data[10])
			{

 $fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	
	
	mysqli_query($conn,"insert into `image_tbl` (regno,img_location) values ('$data[11]','$location')");
  
 $insert_Query = "insert into `tbl_staff` (Name,Email_ID,Gender,Mobile,City,State,Country,Department,Password,Image_Location) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[11]')";	
				try{
       $insert_Result = mysqli_query($conn, $insert_Query);
        
        if($insert_Result)
        {
			
            if(mysqli_affected_rows($conn) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

			else {
				
				echo('Passwords Do Not Match. Please Try Again');
			}
		}
		?>
	<form action="Staff Registration.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data" id="myForm" >
	<div class="header">
  <h1>Attendance Record</h1>
  <p>Making your everyday task much more easier!</p>
    </div>
	<div class="navbar">
  <a href="Index.php" class="active">Home</a>
  <a href="Student Registration.php">Student Register</a>
  <a href="Staff Registration.php">Staff Register</a>
  <a href="Admin Login Page.php" class="right">Admin Login</a>
	<a href="Staff Login.php" class="right">Staff Login</a>
	</div>

  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="366" height="329" border="1" align="center">
      <tbody>
        <tr style="text-align: center">
          <td height="49"><strong>Profile Picture Here</strong></td>
        </tr>
        <tr style="text-align: center">
          <td height="197" colspan="2"
			  style="font-size: large"><strong>Image</strong>
			  <input type="file" name="image">		  
		  </td>
      </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><b>Name</b>
      <input name="txtname" type="text" required id="txtname" placeholder="Enter Name" onBlur="MM_validateForm('txtname','','R');MM_validateForm('txtmailid','','RisEmail');MM_validateForm('txtgender','','R');MM_validateForm('txtmobile','','RisNum');MM_validateForm('txtcity','','R');MM_validateForm('txtstate','','R');MM_validateForm('txtcountry','','R');MM_validateForm('txtdepartment','','R');MM_validateForm('txtcourse','','R');MM_validateForm('txtyear','','RinRange1:2');MM_validateForm('txtpassword','','R');MM_validateForm('txtconfirm','','R');return document.MM_returnValue">
      <b>Email_ID</b>
      <input name="txtmailid" type="text" required id="txtmailid" placeholder="Enter Email-ID">
      <b>Gender</b>
      <input name="txtgender" type="text" required id="txtgender" placeholder="Enter Gender">
      <b>Mobile</b>
      <input name="txtmobile" type="text" required id="txtmobile" placeholder="Enter Mobile Number">
      <b>City</b>
      <input name="txtcity" type="text" required id="txtcity" placeholder="Enter City">
    <b>State</b></p>
    <p>
      <select name="txtstate" size="3" id="select">
		  
        <option>SELECT</option>
        <?php while($row1=mysqli_fetch_array($r2)):;?>
        <option><?php echo  $row1[1];?></option>
        <?php endwhile;?>
      </select>
    </p>
    <p><b>Country</b>
      <input name="txtcountry" type="text" required id="txtcountry" placeholder="Enter Country">
      <b>Department</b>
      <input name="txtdepartment" type="text" required id="txtdepartment" placeholder="Enter Department">
      <b>Password</b>
      <input name="txtpassword" type="text" required id="txtpassword" placeholder="Enter Password">
      <b>Confirm Password</b>
      <input name="txtconfirm" type="text" required id="txtconfirm" placeholder="Confirm Password">
    </p>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="Staff Login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>

</head>

<body>
</body>
</html>
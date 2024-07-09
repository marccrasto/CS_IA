<?php
     include("onn.php");
     //include("php/check.php");

 //$res['role']=$_SESSION['role'];

 //$hid = $_SESSION['id'];

 $errormsg = '';
 $action = "add";

  $name ='';
  $Roll_Number =''; 
  $present_absent =''; 

 if(isset($_POST['save']))
     {
 $id = mysqli_real_escape_string($conn,$_POST['id']);
 $sql = "select name,Roll_Number from student  ";


  $sql = $conn->query("INSERT INTO attendance (name,Roll_Number,present_absent)
  VALUES ('$name','$Roll_Number','$present_absent')") ;

    echo '<script type="text/javascript">window.location="attendance.php";</script>';

 }



 $action = "add";
     if(isset($_GET['action']) && $_GET['action']=="edit" )
 {
   $id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

  $sqlEdit = $conn->query("SELECT * FROM attendance WHERE id='".$id."'");
 if($sqlEdit->num_rows)
  {
   $rowsEdit = $sqlEdit->fetch_assoc();
  extract($rowsEdit);
   $action = "update";
 }
 else
  {
    $_GET['action']="";
  }

}


  if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
 {
  $errormsg = "<div class='alert alert-success'> <a href='#' class='close' 
  data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> Student Add successfully</div>";
 }

?>




<div class="panel panel-default">
    <div class="panel-heading">
            Manage Student  
   <? php echo "Today is " . date("m/d/Y") . "";?>
    </div>
<div class="panel-body">
 <div class="table-sorting table-responsive">
  <table class="table table-striped table-bordered table-hover id="Sortable">
         <thead>
               <tr>
                   <th>S.No</th>
                   <th>Roll Number</th>
                   <th>Name</th>
                   <th>Attendance</th>
                </tr>
           </thead>
         <tbody>

<form method="post" action="class_attendance .php" id="attendance_Form">
            <?php if(isset($_GET["id"]))  
 { 
    $sql = "SELECT * FROM student as s,branch as b WHERE s.branch=b.id and b.id='".$_GET['id']."' and s.delete_status='0' " ;
        $q = $conn->query($sql);
        $i=1;
        while($r = $q->fetch_assoc())
            {

            echo '<tr >
                     <td>'.$i.'</td>
                     <td>'.$r['Roll_Number'].'</td>
                     <td>'.$r['name'].'</td>
                     <td> 
<select  class="form-control" id="present_absent" name="present_absent">                      
       <option  if ($present_absent == "Present" ) echo "selected" value="Present">Present</option>
       <option  if ($present_absent == "Absent" ) echo "selected"  value="Absent">Absent</option>

                      </select>
                     </td>
                   </tr>';
                $i++;
                        }
 }

                     echo "</table>";
                            ?>
                     <button type="submit" name="save" >Save </button>
            </form>
          </tbody>
        </table>
      </div>
    </div>
 </div>
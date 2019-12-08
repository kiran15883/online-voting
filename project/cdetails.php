
<html>
<head>
<title>ELECTION SYSTEM
</title>
</head>
<body>
<form NAME ="ELECTION FORM" method="POST">
<H5 ALIGN="center">CANDIDATE INFORMATION</H5>
<table CELLSPACING="5" CELLPADDING ="5%";align="center">


Party Name:
<select name="to_user" class="form-control">
<option value="pick">Select party name</option>

<?php
    $conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
    $sql=mysqli_query($conn,"SELECT partyid,partyname FROM partyinfo");
    $row=mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)) {
        echo "<option value='".$row['partyid']."'>".$row['partyname']."</option>";
    }
    ?>
</select>
<?php
    if(isset($_POST['to_user'])){
        $x=$_POST["to_user"];
        $_SESSION['partyid']=$x;
    }
    ?>

<TR>
   <TD align="left"> <font size=”4”> Name: </font> </TD>
  <TD><input type="text" required  name="Candidate_name" placeholder="enter in characters"></TD>
</TR>

<TR>
   <TD align="left"> <font size=”4” >Date Of Birth: </font> </TD>
   <TD><input type="date"  name="birth_date" placeholder= "enter in date format" max=<?php echo date('Y-m-d');?>></TD>
</TR>

<TR>
 <TD align=”left”>Gender:</TD>
<TD><input type="radio" required name="Candidate_gender" value="male"> male </input></TD>
<TD><input type="radio" name="Candidate_gender" value="female"> female </input></TD>
</TR>


<TR>
   <TD align="left"> <font size=”4”> City: </font> </TD>
  <TD><input type="text" required name="Candidate_city" placeholder="enter in characters"></TD>
</TR>


<TR>
<TD align="left"> <font size="4">Submit: </font> </TD>
<TD><input type="submit" value="Submit" name="submit"></TD>
</TR>

</table>
</form>


<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" />
  <link href="fiile_nme.css" rel= "stylesheet" type="text/css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
  <script src="z.js">
</script>



<h6 > <img src="110.jpg" width="1500" height="650"></h6>
</body>
</html>



<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
    if(isset($_POST['submit']))
    {
        
        $cname = $_POST['Candidate_name'];
        $cage=$_POST['birth_date'];
        //$pcid=$_POST['Party_ID'];
        $csex=$_POST['Candidate_gender'];
        $ccity=$_POST['Candidate_city'];
       
        
        $query="insert into cadinfo(partyid,candidatename,birthdate,candidategender,candidatecity) values('$x','$cname','$cage','$csex','$ccity')";
        
        if(mysqli_query($conn,$query))
        {
            echo '<script language="javascript">
            alert("candidate details Successfully Registered");
            //location="log.html";
            </script>';
        }
        $query=mysqli_query($conn,'CALL read11');
    
        $sql2= mysqli_query($conn,"SELECT * FROM cadinfo");
        while($row=mysqli_fetch_array($sql2)) {
            echo "candidate ID = ".$row[0]."<br>";
            echo "candidate Name = ".$row[2]."<br>";
            echo "Max votes = ".$row[6]."<br>";
            echo "Age = ".$row[7]."<br>";
        }
    }
    ?>


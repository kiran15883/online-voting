<html>
<head>
<title>ELECTION SYSTEM
</title>
</head>

<body>

<form NAME ="ELECTION FORM"  method="POST">
<H5 ALIGN="center">VOTER INFORMATION</H5>
<table CELLSPACING="5" CELLPADDING ="5%";align="center">




<TR>
   <TD align="left"> <font size=”4”> Voter Name: </font> </TD>
  <TD><input type="text" required  name="Voter_Name" placeholder="enter in characters"> </TD>
</TR>

<TR>
   <TD align="left"> <font size=”4” > Phone Number: </font> </TD>
<TD><input type="tel"  required pattern="\d{10}"  maxlength="10" name="Phone_Number" placeholder= "enter in digits"> </TD>
</TR>

<TR>
<TD align="left"> <font size=”4” >Date Of Birth: </font> </TD>
<TD><input type="date"  name="bdate" placeholder= "enter in date format" max=<?php echo date('Y-m-d');?>></TD>
</TR>

<TR>
  <TD align="left"> <font size=”4” > Address: </font> </TD>
  <TD><input type="text" required  name="Voter_Address" placeholder="enter in characters"></TD>
</TR>

<TR>
 <TD align="left"> <font size="4">Submit: </font> </TD>
 <TD><input type="submit" value="Submit" name="submit"/></TD>
</TR>


</table>
</form>



<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" />
  <link href="fiile_nme.css" rel= "stylesheet" type="text/css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
  <script src="z.js"></script>

<h6> <img src="92.jpg" width="1500" height="620"></h6>

</body>
</html>


<?php
    $conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
    if(isset($_POST['submit']))
    {
        
        $vname = $_POST['Voter_Name'];
        $vno=$_POST['Phone_Number'];
        $vage=$_POST['bdate'];
        $vaddress=$_POST['Voter_Address'];
        
        
        $query="insert into voterinfo(votername,vpno,vbirth,vadd) values('$vname','$vno','$vage','$vaddress')";
        
       
        if(mysqli_query($conn,$query))
        {
            
            echo '<script language="javascript">
            alert("voter details Successfully Registered");
            location="log.html";
            </script>';
            
        }
       
    }
?>

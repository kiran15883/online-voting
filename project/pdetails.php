</html>
<head>
<title>ELECTION SYSTEM
</title>
</head>
<body>
<form name ="ELECTION FORM"  method="POST">
<H5 ALIGN="center"><font size="6">PARTY INFORMATION</H5>
<table CELLSPACING="5" CELLPADDING ="5%";align="center">



<TR>
   <TD align="left"><font size="4">Party Name :</font> </TD>
   <TD><input type="text" required name="Party_Name" placeholder= "enter in characters" ></TD>
</TR>

<TR>
  <TD align="left"><font size="4">Win Percentage : </font></TD>
  <TD><input type="number" required pattern=”[0-9]*” name="Win_Percentage" placeholder="enter in digits"></TD>
</TR>

<TR>
<TD align="left"><font size="4">Male count : </font></TD>
<TD><input type="number" required pattern=”[0-9]*” name="Total_Male" placeholder="enter in digits"></TD>
</TR>

<TR>
<TD align="left"><font size="4">Female count : </font></TD>
<TD><input type="number" required pattern=”[0-9]*” name="Total_Female" placeholder="enter in digits"></TD>
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
  <script src="z.js"></script>

<h6 align="center"> <img src="201.jpg" width="1100" height="650"></h6>
</body>
</html>

<?php
    $conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
    if(isset($_POST['submit']))
    {
       
        $pname = $_POST['Party_Name'];
        $pwin=$_POST['Win_Percentage'];
        $pm = $_POST['Total_Male'];
        $pf= $_POST['Total_Female'];
        
        
        $query="insert into partyinfo(partyname,winpercentage,totalmale,totalfemale) values('$pname','$pwin','$pm','$pf')";
        
        //$sql= (" CREATE OR REPLACE PROCEDURE cadcal IS CURSOR c_count IS SELECT totalmale as a,totalfemale as b FROM partyinfo WHERE totalcandidates=0 for update; c_a number; c_b number; c_tot number;BEGIN Open c_count; LOOP FETCH c_count into c_a,c_b; EXIT when c_count%NOTFOUND; If(c_b!=0) then c_tot=c_a+c_b; end if; update partyinfo set totalcandidates=c_tot where current of c_count; END LOOP;END;");
        

        if(mysqli_query($conn,$query))
        {
            echo '<script language="javascript">
            alert("party details Successfully Registered");
            location="bin.html";
            </script>';
            
        }
    }
    ?>

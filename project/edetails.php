<html>
<head>
<title>ELECTION SYSTEM
</title>
</head>

<body>

<form name ="ELECTION FORM" method="POST">
<H5 ALIGN="center">ELECTION INFORMATION</H5>
<table CELLSPACING="5" CELLPADDING ="5%";align="center">




<TR>
<TD align="left"> <font size= "4"> Election title: </font> </TD>
<TD><input type="text" required  name="Election_Title" placeholder="enter in characters"/></TD>
</TR>

<TR>
<TD align="left"> <font size="4" > No of candidates: </font> </TD>
<TD><input type="number" required pattern=”[0-9]*” name="No_Of_Candidates" placeholder= "enter in digits"/></TD>
</TR>

<TR>
<TD align="left"> <font size=”4” > Date of Election: </font> </TD>
<TD><input type="date" required name="Election_date" placeholder= "enter in date format" min=<?php echo date('Y-m-d');?>></TD>
</TR>

<TR>
<TD align="left"> <font size="5">Submit: </font> </TD>
<TD><input type="submit" value="Submit" name="submit"/></TD>
</TR>

</table>
</form>
<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" />
<link href="fiile_nme.css" rel= "stylesheet" type="text/css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
<script src="z.js">
</script>


<h6 align="center"> <img src="93.png" width="1000" height="600"></h6>

</body>
</html>


<?php
    $conn=mysqli_connect ("localhost","root","","party") or die (mysql_error());
    if(isset($_POST['submit']))
    {
       
        $Etitle = $_POST['Election_Title'];
        $Ecad=$_POST['No_Of_Candidates'];
        $Edate=$_POST['Election_date'];
        
        $query="insert into electioninfo( electiontitle,noofcandidates,electiondate) values('$Etitle','$Ecad','$Edate')";
        if(mysqli_query($conn,$query))
        {
            echo '<script language="javascript">
            alert("Election details Successfully Registered");
            location="bin.html";
            </script>';
            
        }
    }
    ?>




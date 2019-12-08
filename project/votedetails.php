<html>
<head>
<title>ELECTION SYSTEM
</title>
</head>
<body>
<form name ="ELECTION FORM" method="POST">
<H5 ALIGN="center">CASTING VOTE</H5>
<TABLE CELLSPACING="5" CELLPADDING ="5%" align="left">


Voter Name:
<select name="to_user" class="form-control">
<option value="pick">please select voter name </option>

<?php
    $conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
    $sql=mysqli_query($conn,"SELECT voterid,votername FROM voterinfo");
    $row=mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)) {
        echo "<option value='".$row['voterid']."'>".$row['votername']."</option>";
    }
    ?>
</select>
<?php
    if(isset($_POST['to_user'])){
        $x=$_POST["to_user"];
        $_SESSION['voterid']=$x;
    }
    ?>


Candidate Name:
<select name="user" class="form-control">
<option value="pick">please select candidate you need to vote</option>

<?php
    $conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
    $sql1=mysqli_query($conn,"SELECT candidateid,candidatename FROM cadinfo");
    $row=mysqli_num_rows($sql1);
    while($row=mysqli_fetch_array($sql1)) {
        echo "<option value='".$row['candidateid']."'>".$row['candidatename']."</option>";
    }
    ?>
</select>
<?php
    if(isset($_POST['user'])){
        $y=$_POST["user"];
        $_SESSION['candidateid']=$y;
    }
    ?>



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
  <script src="z.js">
</script>

 <h6><img src="111.jpg" width="1500" height="650"></h6>
</body>
</html>

<?php
$conn=mysqli_connect("localhost","root","","party") or die (mysql_error());
if(isset($_POST['submit']))
{
//$vvid=$_POST['voter_ID'];
//$vcid = $_POST['Candidate_ID'];


$query="insert into voteinfo(voterid,candidateid) values ('$x','$y')";
    if(mysqli_query($conn,$query))
{
echo '<script language="javascript">
alert("vote details Successfully Registered");
    location="log.html";
</script>';

}
}
?>

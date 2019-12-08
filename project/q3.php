<html>
<head><title><Query1></title>
<style type="text/css">
body {background-image: url("61.jpg"); background-size: cover; font-size: 15px;}
fieldset {
display:inline;
    background-color: rgba(255,255,255,0.84);
padding:10px;
    font-size: 15px;
    font-style: italic;
border:2px groove;
    border-color:pink;
    //background:transparent;
}
</style>
<body>
<section style="padding-left: 460px;padding-top: 150px">
<fieldset>
<div style="padding-top:35px;padding-right:45px;padding-left: 25px">
<fieldset>
<h1 style="text-align: center">Enter the voter name to know for which candidate he has voted</h1>
<form  method="GET">


<TR>
<TD align="left"><font size="4">Voter Name:

<select class="input-field" name="voterid">
<option disabled selected value> Select name</option>
<?php
    $servername   = "localhost";
    $database = "party";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = mysqli_Connect($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        $sql1 = mysqli_query($conn,"select * from voterinfo;");
        if(!$sql1)
        {
            echo "Error".mysqli_error($sql);
        }
        else
        {
            while($row = mysqli_fetch_assoc($sql1))
            {
                $hid=$row['voterid'];
                $hname=$row['votername'];
                echo '<option value="'.$hid.'">'.$hname.'</option>';
            } }}
    ?>
</select>






<input type="submit" name="submit" value="search" required ><br>
<TR>

</fieldset>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
<script src="z.js"></script>

    <?php
        session_start();
        error_reporting (E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        $conn=mysqli_connect("localhost","root","","party") or die(mysql_error());
        $query = $_GET['voterid'];
        $raw_results = mysqli_query($conn,"SELECT v.candidateid ,c.candidatename,c.candidategender,p.partyid,p.partyname
                                    from voteinfo v,cadinfo c,partyinfo p
                                    WHERE v.voterid=$query
                                    and c.partyid=p.partyid
                                    and v.candidateid=c.candidateid");
                                    if(mysqli_num_rows($raw_results) ==1){
                                    while($results = mysqli_fetch_array($raw_results)){
                                    echo "<p><h3>"."candidate ID = ".$results['candidateid']."</h3>"."candidate name = ".$results['candidatename']."</p>"." Candidate Gender = ".$results['candidategender'].
                                    "</p></h3>";
                                    echo "<p><h3>"."Party ID= ".$results['partyid']."</h3>"." Party Name = ".$results['partyname']."</p></h3>";
                                    
                                    }
                                    }
                                    else{
                                    echo "No results";
                                    }
                                    
        ?>

</body>
</html>


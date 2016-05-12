
<html>
    <body>
        <h1> Elective Registration</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Elective Subjects Offered <br>
            <input type="submit" name="elective">
        </form><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Zero Registration <br>
            <input type="submit" name="zero_reg">
        </form>
    </body>
</html>


<?php
    $conn = mysql_connect("localhost:3306","root","");
    mysql_select_db("elective");
    
    if(isset($_POST['zero_reg']))
    {
        $query = "SELECT * FROM tb WHERE registration = '0'";
        $run_query = mysql_query($query);
        while($row = mysql_fetch_assoc($run_query))
        {
            echo $row['name'].PHP_EOL;
        }
    }
    if(isset($_POST['elective']))
    {
        $query = "SELECT * FROM tb";
        $run_query = mysql_query($query);
        while($row =  mysql_fetch_assoc($run_query))
        {
            echo $row['name']."<br>";
        }
    }
       
?>
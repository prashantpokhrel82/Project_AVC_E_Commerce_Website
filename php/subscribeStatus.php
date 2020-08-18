<?php
        include 'sql_connect.php';
        $sql="SELECT count(*) as subscribers, time_stamp as date from subscribe group by month(time_stamp) order by time_stamp asc;";
        $result=mysqli_query($conn,$sql);
        $dbdata = array();
        if($result){
            while ( $row = $result->fetch_assoc())  {
                $dbdata[]=$row;
              }
              echo json_encode($dbdata);
        }
    ?>

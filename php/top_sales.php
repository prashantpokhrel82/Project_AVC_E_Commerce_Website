<?php
        include 'sql_connect.php';
        $sql="SELECT item.name as label,SUM(quantity) as value FROM pending_order JOIN item on pending_order.item_id=item.id GROUP BY item_id ORDER BY value DESC LIMIT 3;";
        $result=mysqli_query($conn,$sql);
        $dbdata = array();
        if($result){
            while ( $row = $result->fetch_assoc())  {
                $dbdata[]=$row;
              }
              echo json_encode($dbdata);
        }
    ?>
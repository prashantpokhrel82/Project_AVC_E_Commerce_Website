<?php



    $title="Admin";
    $selected="dashboard";
    include 'header.php';
    session_start();
    if((!isset($_SESSION['admin-username']))||($_SESSION['admin-username']==''))
    {
      echo "Please Login First";
    }
    else{

      echo $_SESSION['admin-username'];


?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include 'navigation.php';?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard </h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->

          <div class="row-lg-12">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Top Sales
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

          </div>
          

            <!--next row-->
            <div class="row-lg-12">
                      <div class="col-lg-6">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  Top Sales
                              </div>
                              <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <div id="morris-area-chart"></div>
                              </div>
                              <!-- /.panel-body -->
                          </div>
                          <!-- /.panel -->
                      </div>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Customer Count
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="customer_count">
                        <?php
                            include 'php/sql_connect.php';
                            $sql="SELECT COUNT(*) as total FROM customer;";
                            $result=mysqli_query($conn,$sql);

                            if($result){
                                while ( $row = $result->fetch_assoc())  {
                                    echo $row['total'];
                                }

                            }
                        ?>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                    <!-- /.panel -->
              </div>
            <!--finish next row-->



        </div>

      </div>

    </div>

</div>

<?php include 'footer.php';
}//close top else
?>

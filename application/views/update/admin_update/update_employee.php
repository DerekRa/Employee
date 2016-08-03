        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Edit Employee Info</h1>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php  
                                        echo anchor("dataadminfunctioncont/employee_tablefix/0","All Employees Query");
                                        ?> > Edit Information
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                     
                                             <?php include "form_register.php"; ?>  

                                        </div>

                                    </div>
                                    <!-- /.panel-body -->
                                </div><a href="#menu-toggle" class="btn btn-default btn-circle" id="menu-toggle">Menu</a>

                             <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

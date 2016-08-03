        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Table Of Emplyees</h1>
                        </div>
                    </div>
                       
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Employees Query
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                            <div class="table-responsive">
                             <table class="table table-bordered table-hover" border="1" width="100%" align="center" style="font-size:3mm !important" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th colspan="2">First Name</th>
                                            <th colspan="3">Last Name</th>
                                            <th colspan="3">Birthday</th>
                                            <th colspan="3">Address</th>
                                            <th colspan="3">Email</th>
                                            <th colspan="3">Salary</th>
                                            <th colspan="3">Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($empltables as $row) { ?>
                                        <tr class="gradeA">
                                            <td colspan="2">
                                                <?php echo $row->firstname; ?>        
                                            </td><td colspan="3">
                                                <?php echo $row->lastname; ?>        
                                            </td><td colspan="3">
                                                <?php echo $row->birthday; ?>        
                                            </td><td colspan="3">
                                                <?php echo $row->address; ?>        
                                            </td><td colspan="3">
                                                <?php echo $row->email; ?>        
                                            </td><td colspan="3">
                                                <?php echo "P ".$row->salary; ?>        
                                            </td><td colspan="3">
                                                <?php echo $row->username; ?>        
                                            </td>
                                        </tr>
                                        <?php } ?>

                                     </tbody>
                                      

                            </table>
            
                                </div>

                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>

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



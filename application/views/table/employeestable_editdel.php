        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Table Area</h1>
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
                            
                             <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Birthday</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Salary</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php foreach($empltables as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->firstname; ?>        
                                            </td><td>
                                                <?php echo $row->lastname; ?>        
                                            </td><td>
                                                <?php echo $row->birthday; ?>        
                                            </td><td>
                                                <?php echo $row->address; ?>        
                                            </td><td>
                                                <?php echo $row->email; ?>        
                                            </td><td>
                                                <?php echo "P ".$row->salary; ?>        
                                            </td><td>
                                                <?php echo $row->username; ?>        
                                            </td><td>
                                                <div class="toinlineit">
                                                <form action="../edit_employee" method="POST" >
                                                <input type="text" name="user_id" placeholder="" value="<?php echo $row->user_id; ?>" hidden>
                                                <button type="submit" class="btn btn-info round" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
                                                </form>
                                                </div>
                                                <div class="toinlineit">
                                                <form action="../delete_employee" method="POST" >
                                                <input type="text" name="user_id" placeholder="" value="<?php echo $row->user_id; ?>" hidden>
                                                <button type="submit" class="btn btn-danger round" title="Delete"><span class="glyphicon glyphicon-remove"></span></button>
                                                </form>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        
                                     </tbody>
                                     <?php echo $links; ?>     
                            </table>
                            <?php echo anchor('dataadminfunctioncont/pdf_format', 'View in PDF Format','id="logout"') ?>
                                </div>
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



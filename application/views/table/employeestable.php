<script type="text/javascript" >
        $(document).ready(function() {
        $('#dataTables-example').DataTable();
        } );
    </script>
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
                                            <?php $admincheck = $datainfo[0]->admin_check;
                                            if ($admincheck==1) {
                                            echo "<th>Salary</th>";
                                            echo "<th>Username</th>";
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($empltables as $row) { ?>
                                        <tr class="gradeA">
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
                                            </td>
                                            <?php if ($admincheck==1) {
                                            echo "<td>";
                                            echo "P ".$row->salary;       
                                            echo "</td><td>";
                                            echo $row->username;    
                                            echo "</td>";    
                                            } }?>
                                        </tr>
                                     </tbody>
                                     <?php echo $links; ?>     

                            </table>
                            <?php 
                            // $admincheck = $datainfo[0]->admin_check;
                            if ($admincheck==1) {
                            echo anchor('dataadminfunctioncont/pdf_format', 'View in PDF Format','id="logout"');
                            echo " | ";
                            echo anchor('dataadminfunctioncont/excel_format', ' Excel Format','id="logout"');
                            }else{
                            echo anchor('dataemployeefuncont/pdf_format', 'View in PDF Format','id="logout"'); 
                            }
                            ?>
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

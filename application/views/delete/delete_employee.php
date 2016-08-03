        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Delete Employee Info</h1>
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

<p><strong>Are you sure you want to delete this employee record?</strong>
<small>
<?php echo anchor('dataadminfunctioncont/employee_tablefix/0', 'Cancel it now!') ?></small>
</p>
<hr>
<?php foreach ($emplinfo as $info) { ?>
<p><strong>Yes Please!!!</strong> Delete and swipe it out from database totally and permanently..</p>
<form action="delete_employeeperm" method="POST" >
<input type="text" name="user_id" placeholder="" value="<?php echo $info->id_employee; ?>" hidden>
<button type="submit" class="btn btn-danger" title="Delete Permanently"><span class="glyphicon glyphicon-remove-sign"></span>
Delete It Now
</button>
</form>
</br>
<p><strong>Yes!?!</strong> Flag this record as deleted to keep track on the History of Employee Information..</p>
<p><small>Note* It will not show in quering active employee information; It will not also show in displaying active employees on table.</small></p>
<form action="delete_employee" method="POST" >
<input type="text" name="user_id" placeholder="" value="<?php echo $info->id_employee; ?>" hidden>
<button type="submit" name="submit" class="btn btn-danger" title="Keep Track still"><span class="glyphicon glyphicon-remove-sign"></span>
Delete Still
</button>
</form>
<?php } ?>
                                                </br>
                                                </br>
                                        <div class="dataTable_wrapper">
                                     
                                             <?php include "form_del.php"; ?>  

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

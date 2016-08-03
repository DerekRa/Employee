        <!-- Page Content -->
        <div id="page-content-wrapper">
        <?php echo season_test(); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                            <div class="col-lg-12">

                                <h1 class="page-header">
                                        Welcome <?php 
                                        $admincheck = $datainfo[0]->admin_check;
                                        if ($admincheck==1) { echo "Admin";
                                        } else { }
                                        echo " " .ucfirst($datainfo[0]->firstname). " " .ucfirst($datainfo[0]->lastname); ?>
                                </h1>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Have a Great day!!</p>


                                <div class="alert alert-success" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong> Successfully Login! </strong>
                                </div>    

                                <br>
                                <br>
                                <br>
                                <a href="#menu-toggle" class="btn btn-default btn-circle" id="menu-toggle">
                                            Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(800, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 1000);
});
</script>

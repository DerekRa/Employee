
<body>


    <div id="wrapper">
   
<!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                       <?php $un = ucfirst($this->session->userdata('username'));
                       $admincheck = $datainfo[0]->admin_check;
                        if ($admincheck==1) {
                            echo anchor('dataadminfunctioncont/profile', 'Hi Admin '. $un);
                            echo "</li><li>";
                            echo anchor('dataadminfunctioncont/employee_table', 'Employee Table Info');
                            echo "</li><li>";
                            echo anchor('dataadminfunctioncont/register_employee', 'Register New Employee');
                            echo "</li><li>";
                            echo anchor('dataadminfunctioncont/employee_tablefix/0', 'Fix Employee Info');
                            echo "</li><li>";
                            echo anchor('dataadminfunctioncont/profile', 'My Profile');
                            echo "</li><li>";
                            echo anchor('dataadminfunctioncont/logout', 'Logout');
                         } else { 
                            echo anchor('dataemployeefuncont/profile', 'Hello '. $un);
                            echo "</li><li>";
                            echo anchor('dataemployeefuncont/employee_table', 'Employee Table Info');
                            echo "</li><li>";
                            echo anchor('dataemployeefuncont/profile', 'My Profile');
                            echo "</li><li>";
                            echo anchor('dataemployeefuncont/logout', 'Logout');
                            } ?>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
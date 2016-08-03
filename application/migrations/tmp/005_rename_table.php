<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Rename_table extends CI_Migration {

        public function up()
        {

                $this->dbforge->rename_table('employee_informations', 'employee_information');
        }

        public function down()
        {
                $this->dbforge->drop_table('employee_information');
        }


}
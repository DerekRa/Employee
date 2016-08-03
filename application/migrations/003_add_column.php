<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_column extends CI_Migration {

        public function up()
        {
                $fields = array(
                        'contact_number' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE,
                                'after' => 'address'
                        )
                );

                if($this->dbforge->add_column('employee_information', $fields))
                {
                        echo "<br>";
                        echo "Added column contact_number to table employee_information!";
                }
        }

        public function down()
        {
                if($this->dbforge->drop_column('employee_information','contact_number'))
                {
                        echo "<br>";
                        echo "Successfully drop column contact_number for table employee_information!";
                }
        }


}
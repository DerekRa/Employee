<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Modify_column extends CI_Migration {

        public function up()
        {
                
                $fields = array(
                        'contact_number' => array(
                                'name' => 'contactnumber',
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE,
                                'after' => 'address'
                        )
                );

                if($this->dbforge->modify_column('employee_information', $fields))
                {
                        echo "<br>";
                        echo "Modify column contact_number to contactnumber!";
                }
        }

        public function down()
        {
                $fields = array(
                        'contactnumber' => array(
                                'name' => 'contact_number',
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE,
                                'after' => 'address'
                        )
                );
                if($this->dbforge->modify_column('employee_information',$fields))
                {
                        echo "<br>";
                        echo "Return back column modification to contact_number!";
                }
        }


}
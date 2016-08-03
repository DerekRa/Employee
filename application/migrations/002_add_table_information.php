<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_information extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_employee' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'firstname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 30,
                                'null' => TRUE
                        ),
                        'lastname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 30,
                                'null' => TRUE
                        ),
                        'birthday' => array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                        'address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'salary' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'null' => TRUE
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 30,
                                'null' => TRUE
                        )
                ));

                $this->dbforge->add_key('id_employee', TRUE);
                if($this->dbforge->create_table('employee_information'))
                {
                        echo "<br>";
                        echo "Table employee_information created!";
                }
        }
        
        public function down()
        {
                if($this->dbforge->drop_table('employee_information'))
                {
                        echo "<br>";
                        echo "Successfully drop table for employee_information!";
                }
        }


}
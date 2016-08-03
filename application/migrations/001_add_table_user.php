<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id_user' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => TRUE
                        ),
                        'created_date' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'updated_date' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'delete_flag' => array(
                                'type' => 'TINYINT',
                                'constraint' => 3,
                                'default' => 0
                        ),
                        'admin_check' => array(
                                'type' => 'TINYINT',
                                'constraint' => 3,
                                'default' => 0
                        )
                ));

                $this->dbforge->add_key('id_user', TRUE);
                // $this->db->query('use gocloudexam');
                if($this->dbforge->create_table('employee_user')){
                        echo "<br>";
                        echo "Table employee_user created!";
                }
        }

        public function down()
        {
                // $this->db->query('use gocloudexam');
                if($this->dbforge->drop_table('employee_user'))
                {
                        echo "<br>";
                        echo "Successfully drop table for employee_user!";
                }
        }

}
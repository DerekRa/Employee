<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_db extends CI_Migration {

        public function up()
        {
                if ($this->dbforge->create_database('gocloudexam'))
                        {
                                echo 'Database created!';
                        } 
        }

        public function down()
        {
                if ($this->dbforge->drop_database('gocloudexam'))
                        {
                                echo 'Database deleted!';
                        }
        }


}
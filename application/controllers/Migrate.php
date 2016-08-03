<?php

class Migrate extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
$this->load->library('migration');
    // $this->input->is_cli_request() 
      // or exit("Execute via command line: php index.php migrate");
  }

        // public function index($var)
        public function index()
        {
                // $this->load->library('migration');

                // if ($this->migration->version($var) === FALSE)
                if ($this->migration->version(4) === FALSE)
                {
                        show_error($this->migration->error_string());
                } else {
                    echo "<br>";
                    echo 'Migrations ran successfully!';
                }   
        }

}
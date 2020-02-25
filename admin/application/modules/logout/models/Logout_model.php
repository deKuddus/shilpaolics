<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_model extends MY_Model {

    protected $_table_name = 'customer';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';



    function __construct()
    {
        parent::__construct();
    }
}
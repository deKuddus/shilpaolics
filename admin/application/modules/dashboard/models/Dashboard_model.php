<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model {

    protected $_table_name = 'table_name';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }

}
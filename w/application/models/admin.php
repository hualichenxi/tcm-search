<?php
class Admin extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * get admin info by username
     * @param $username
     * @return bool
     */
    public function getAdminInfoByUsername($username) {
        $username = trim($username);
        if (empty($username)) {
            return array();
        }
        $sql = "select * from `admin` where username  = '{$username}' limit 1;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return empty($result[0]) ? array() : $result[0];
    }
}
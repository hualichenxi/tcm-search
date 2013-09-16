<?php
class Resource extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 根据名称搜索resource关联信息
     * @param $resourceName
     * @param $offset
     * @param $limit
     * @return bool
     */
    public function getResourceInfoByActinName($resourceName,$offset = 0,$limit = 10) {
        $resourceName = trim($resourceName);
        if (empty($resourceName)) {
            return array();
        }
        $sql = "select * from `resource` where title like '{$resourceName}%' limit {$offset},{$limit};";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return empty($result) ? array() : $result;
    }

    public function getResourceInfoCountByActinName($resourceName) {
        $resourceName = trim($resourceName);
        if (empty($resourceName)) {
            return array();
        }
        $sql = "select count(1) as cn from `resource` where title like '{$resourceName}%';";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return empty($result[0]['cn']) ? 0 : $result[0]['cn'];
    }
}
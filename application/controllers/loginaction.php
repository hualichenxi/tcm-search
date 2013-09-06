<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * 网站注册行为页面
     * added by xiongjiewu at 2013-3-4
     */
class Loginaction extends CI_Controller {


    private function _checkCommon($username,$password,$remember)
    {
        $result = array(
            "code" => "error",
            "info" => "Please input username.",
        );
        if (!isset($username)) {
            return $result;
        }
        if (!isset($password)) {
            $result['info'] = "Please input password.";
            return $result;
        }
        $this->load->model('Admin');
        $info = $this->Admin->getAdminInfoByUsername($username);
        if (empty($info)) {
            $result['info'] = "Username or password is not correct.";
            return $result;
        } elseif ($info['password'] != base64_encode(md5($password))) {
            $result['info'] = "password is not correct.";
            return $result;
        } else {
            $this->setLoginCookie($info['username'],$info['id'],86400,$remember);
            $result['code'] = "success";
            $result['info'] = "success";
            return $result;
        }
    }

    public function login()
    {
        $username = trim($this->input->post("username"));
        $password = trim($this->input->post("password"));
        $remember = trim($this->input->post("remember"));
        echo json_encode($this->_checkCommon($username,$password,$remember));
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 网站首页
 */
class Welcome extends CI_Controller {
    private $_limit = 10;

    public function __construct() {
        parent::__construct();
        $this->load->model('Resource');
    }

	public function index()
	{
        $name = $this->input->get("name");
        if (isset($name) && ($name != "")) {
            $page = $this->input->get("p");
            $page = empty($page) ? 1 : $page;
            $resourceInfoCount = $this->Resource->getResourceInfoCountByActinName($name);
            $resourceInfo = $this->Resource->getResourceInfoByActinName($name,($page - 1) * $this->_limit,$this->_limit);
            var_dump($resourceInfo);
        }
        $this->load->set_css(array("/css/index/home2.css"));
        $this->load->set_js(array("/js/index/home2.js"));
        $this->load->set_title("首页 - " . $this->base_title . " - " . APF::get_instance()->get_config_value("base_name"));
        $this->set_view('index/home2','base3');

	}
}
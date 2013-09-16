<?php
class zhuanqu {
    private $_url;
    private $_params;
    private $_pdo;
    private $_id;
    private $_maxId;
    private $_limit = 100;
    private $_idFile = "/root/chenxi/logs/zhuaqu_id";

    function __construct() {
        $this->_url = "http://s.wanfangdata.com.cn/sru/paper.ashx";
        $this->_params = array(
            "operation" => "searchRetrieve",
            "query" => "{A} sortby relevance",
            "maximumRecords" => $this->_limit,
            "startRecord" => 1,
            "version" => 1.2,
        );
        $this->_pdo = $this->_getPdo();

    }

    public function run() {
        global $argv;
        if (!empty($argv[1])) {
            $this->_idFile .= "_" . $argv[1];
        } else {
	    echo "Pleace input the file param.";
	    exit;
	}
	
	
        if (file_exists($this->_idFile)) {
            $this->_id = intval(file_get_contents($this->_idFile));
        } else {
            $this->_id = ($argv[1] - 1) * 10000;
        }


        if (!empty($argv[1])) {
            $this->_maxId = $argv[1] * 10000 - 1;
        }

        while($wordInfo = $this->_getUserInfo($this->_id)) {
            foreach($wordInfo as $wordVal) {
                $word = $wordVal['name'];
                $params = $this->_params;
                $params['query'] = str_replace("{A}",$word,$params['query']);
                $this->_dealInfo($params);
                $this->_id = $wordVal['id'];
                file_put_contents($this->_idFile,$this->_id);
            }

        }
    }

    private function _dealInfo($params) {
        $p = 1;
        while(1) {
            $params['startRecord'] = ($p - 1) * $this->_limit + 1;
            $data = $this->myCurl($this->_url,$params);
            preg_match("/<numberOfRecords>(.*?)<\/numberOfRecords>/si",$data,$num);
            if (empty($num[1]) || ($params['startRecord'] > $num[1])) {
                return false;
            }
            $data = str_replace('srw_dc:dc xmlns:dc="info:srw/schema/1/dc-v1.1" xmlns:srw_dc="info:srw/schema/1/dc-v1.1"', 'srw', $data);
            $data = str_replace('srw_dc:dc', 'srw', $data);
            $data = str_replace('dc:', '', $data);
            $xml = new SimpleXmlElement($data);
            foreach ($xml->records->record as $r) {
                $x = $r->recordData->srw;
                $insertData = array();
                $title = $x->title;
                $insertData['title'] = $x->title;
                $insertData['creator'] = $x->Creator;
                $insertData['source'] = $x->source;
                $insertData['publisher'] = $x->Publisher;
                $insertData['type'] = $x->Type;
                $insertData['subject'] = $x->Subject;
                $insertData['description'] = $x->Description;
                $insertData['identifier'] = $x->Identifier;
                $id = $this->_insertData($insertData);
                var_dump($id);
            }
            $p++;
        }
    }

    private function _insertData($insertData) {
        if (empty($insertData)) {
            return false;
        }
        $sqlAdd = array_fill(0,count($insertData),"?");
        $key = array_keys($insertData);
        $values = array_values($insertData);
        $sql = "insert into `resource` (" . implode(",",$key) . ") values (" . implode(",",$sqlAdd) . ");";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->execute($values);
        $id = $this->_pdo->lastInsertId();
        if (!empty($id)) {
            $upSql = "update `resource` set file = ? where id = ?;";
            $stmt = $this->_pdo->prepare($upSql);
            $stmt->execute(array("{$id}.pdf",$id));
            return $id;
        }
        return false;
    }

    /** curl 获取信息
     * @param $url
     * @param bool $json
     * @return mixed
     */
    public function myCurl($url, $params = array(),$json = false,$get = true)
    {
        if (empty($params) || !is_array($params)) {
            return false;
        }
        $url .= "?" . http_build_query($params);
        $ch = curl_init (); //初始化curl
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); //设置是否返回信息
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Content-type: text/xml")); //设置HTTP头
        curl_setopt ($ch, CURLOPT_URL, $url); //设置链接
        $response = curl_exec ($ch); //接收返回信息
        curl_close ($ch); //关闭curl链接
        return $json ? json_decode ($response, true) : $response;
    }

    private function _getPdo() {
        $dsn = "mysql:host=localhost;dbname=hamster";
        $db = new PDO($dsn, 'root', '123456');
        $db->query("set names utf8");
        return $db;
    }

    protected function _getUserInfo($id = 0)
    {
        $sql = "select * from `def` where id > ?";
        if (!empty($this->_maxId)) {
            $sql .= " and id <= " . $this->_maxId;
        }

        $sql .= " order by id asc limit 10";
        $stmt = $this->_pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }
}

$do = new zhuanqu();
$do->run();

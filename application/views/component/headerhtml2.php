<meta charset="utf-8">
<meta name="description" content="<?php echo APF::get_instance()->get_config_value("base_description");?>"/>
<meta name="keywords" content="<?php echo APF::get_instance()->get_config_value("base_name");?>电影库,最新电影,电影排行榜,<?php echo APF::get_instance()->get_config_value("base_name");?>网"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php if ($this->load->get_title()):?><?php echo $this->load->get_title();?><?php else:?>好吧<?php endif;?></title>
<?php $css = $this->load->get_css();?>
<?php $cssArr[] = "/css/main/base2.css";?>
<?php $cssArr[] = "/css/main/base3.css";?>
<?php if (!empty($css)):?>
    <?php foreach($css as $cssKey => $cssVal):?>
        <?php $cssArr[] = "/" . trim($cssVal,"/");?>
    <?php endforeach;?>
<?php endif;?>
<?php $jsArr[] = "/js/main/jquery-1.7.2.js";?>
<?php $jsArr[] = "/js/main/base3.js";?>
<?php if ($this->load->get_login_pan()):?>
    <?php $cssArr[] = "/css/member/loginpan.css";?>
    <?php $jsArr[] = "/js/member/loginpan.js";?>
<?php endif;?>
<?php $js = $this->load->get_js();?>
<?php if (!empty($js)):?>
    <?php foreach($js as $jsKey => $jsVal):?>
        <?php $jsArr[] = "/" . trim($jsVal,"/");?>
    <?php endforeach;?>
<?php endif;?>
<link rel="stylesheet" rev="stylesheet" href="/gettaticfile/css.css?path=<?php echo base64_encode(implode(";",$cssArr));?>" type="text/css" />
<script type="text/javascript" src="/gettaticfile/js.js?path=<?php echo base64_encode(implode(";",$jsArr));?>"></script>
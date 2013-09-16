<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("component/headerhtml2");//页面标题，js，css?>
</head>
<body>
<div class="main" id="total_info_main">
    <div class="container">
        <?php $view = $this->load->get_view();?>
        <?php if (!empty($data)):?>
            <?php $this->load->view($view,$data);?>
        <?php else:?>
            <?php $this->load->view($view);?>
        <?php endif;?>
    </div>
</div>
</body>
</html>

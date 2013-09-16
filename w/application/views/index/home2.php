<div class="home_top">
    <div class="search">
        <form class="" action="" name="search" id="search" method="get">
            <input class="name" type="text" id="name" name="name" value="<?php echo $name;?>">
            <input value="search" class="search"  type="submit">
        </form>
    </div>
    <div class="login">
        <?php if (!empty($userName)):?>
            Welcome <?php echo $userName;?>
        <?php else:?>
        <a href="/login">
            admin
        </a>
        <?php endif?>
    </div>
</div>
<div class="content">
    <?php if (!empty($resourceInfo)):?>
    <table class="list" cellSpacing="0" cellPadding="0" >
        <tr>
            <th>title</th>
            <th>author</th>
            <th>content</th>
            <th>action</th>
        </tr>
	<?php foreach($resourceInfo as $resourceInfoVal):?>
        <tr>
            <td class="title"><?php echo $resourceInfoVal['title'];?></td>
            <td class="author"><?php echo $resourceInfoVal['creator'];?></td>
            <td class="content"><?php echo $resourceInfoVal['description'];?></td>
            <td class="action">
                <a href="">delete</a>
                |
                <a href="">view</a>
            </td>
        </tr>
	<?php endforeach;?>
    </table>
    <?php endif;?>
    <?php if ($resourceInfoCount > $limit):?>
            <div class="page_info">
                <table class="page">
                    <tr>
                        <td>
                            <?php $this->load->view("component/pagenew", array("fenye" => $fenye));?>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endif;?>
</div>

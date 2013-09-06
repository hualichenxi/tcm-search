<div class="home_top">
    <div class="search">
        <form class="" action="" name="search" id="search" method="get">
            <input class="name" type="text" id="name" name="name" value="">
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
    <table class="" cellSpacing="0" cellPadding="0" >
        <tr>
            <th>title</th>
            <th>author</th>
            <th>content</th>
            <th>action</th>
        </tr>
        <tr>
            <td class="title">title title title</td>
            <td class="author">author author author</td>
            <td class="content">authorauthorauthorauthorauthorauthor</td>
            <td class="action">
                <a href="">delete</a>
                |
                <a href="">view</a>
            </td>
        </tr>
        <tr>
            <td class="title">title title title</td>
            <td class="author">author author author</td>
            <td class="content">authorauthorauthorauthorauthorauthor</td>
            <td class="action">
                <a href="">delete</a>
                |
                <a href="">view</a>
            </td>
        </tr>
        <tr>
            <td class="title">title title title</td>
            <td class="author">author author author</td>
            <td class="content">authorauthorauthorauthorauthorauthor</td>
            <td class="action">
                <a href="">delete</a>
                |
                <a href="">view</a>
            </td>
        </tr>
        <tr>
            <td class="title">title title title</td>
            <td class="author">author author author</td>
            <td class="content">authorauthorauthorauthorauthorauthor</td>
            <td class="action">
                <a href="">delete</a>
                |
                <a href="">view</a>
            </td>
        </tr>
    </table>
</div>
<div class="doing"></div>
<div class="login">
    <div class="login_ui" id="login_ui_pan">
        <div class="login_ui_title">
            <table>
                <tr>
                    <td class="l_t" colspan="2">
                    </td>
                </tr>
            </table>
        </div>
        <form name="login_form" id="login_form" method="post" onsubmit="return false;">
            <div class="login_ui_table">
                <table>
                    <tr><td class="ui_error loginpan_error"></td></tr>
                    <tr>
                        <td class="user_input">
                            <span class="username_icon" c="username_icon_over"></span>
                            <label>username</label>
                            <input type="text" class="username" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td class="user_input">
                            <span class="password_icon" c="password_icon_over"></span>
                            <label>password</label>
                            <input type="password" class="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td class="ui_remember">
                            <input type="checkbox" name="checkbox" class="remember">记住登录状态&nbsp;&nbsp;<a href="<?php echo get_url("/password?r=" . time())?>">忘记密码？</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ui_login">
                            <input type="submit" class="submit" name="login_submit" value="登&nbsp;录">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/6/10
 * Time: 19:46
 */
?>
<form action="login" method="post">
    <input type="hidden" name="_token" value="{{CSRF_token()}}"/>
    用户名:<input type="text" name="uname"><br><br>
   密码: <input type="text" name="pwd"><br><br>
    <input type="submit" value="登录">
</form>

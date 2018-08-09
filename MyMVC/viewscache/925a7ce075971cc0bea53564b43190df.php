<div id="sidebar">

    <h3>站内搜索</h3>
    <form action="index/search/" class="searchform" method="post">
        <p>
            <input name="ss" class="textbox" type="text" />
            <input class="button" value="Search" type="submit" />
        </p>
    </form>

    <h3>Welcome</h3>
    <p>&quot;欢迎本站的第<?=$lookcount; ?>位访问者,欢迎你的到来&quot; </p>

    <p class="align-right">- Snowman</p>

    <h3>今日天气</h3>
    <div style="width:250px;height:88px;background-image: url('public/images/weather.jpg')">
        <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <?=$weather['city']; ?>
        <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <?=$weather['temp1']; ?> ~ <?=$weather['temp2']; ?>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        今日:<?=$weather['weather']; ?>
    </div>

    <h3>最新</h3>
    <ul class="sidemenu">
        <?php foreach ($rigth_news as $value): ?>
        <li><a href="index/look/tid/<?=$value['tid']; ?>"><?=$value['title']; ?></a></li>
        <?php endforeach; ?>

    </ul>



    <h3>最热</h3>
    <ul class="sidemenu">
        <?php foreach ($rigth_hots as $value): ?>
        <li>
            <a href="index/look/tid/<?=$value['tid']; ?>"><?=$value['title']; ?> <br />
                <span></span></a>
        </li>
        <?php endforeach; ?>

    </ul>

    <?php if (!isset($_SESSION['uid'])): ?>
    <h3>管理登录</h3>
    <form action="login/login" class="searchform" method="post">
        <p>
            <input name="uname" class="textbox" type="text" placeholder="Username"/><br><br>
            <input name="pwd" class="textbox" type="password" placeholder="Password"/>
            <input class="button" value="Search" type="submit" />
        </p>
    </form>
    <?php endif; ?>

    <h3>Support Styleshout</h3>
    <p>If you are interested in supporting my work and would like to contribute, you are
        welcome to make a small donation through the
        <a href="http://www.cssmoban.com/">donate link</a> on my website - it will
        be a great help and will surely be appreciated.</p>

    <!-- sidebar ends -->
</div>
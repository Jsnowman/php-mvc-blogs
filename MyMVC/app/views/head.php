<div id="header">

    <h1 id="logo-text"><a href="index.html" title="">Snowman</a></h1>
    <p id="slogan">一个菜鸟程序员的逆袭之路...</p>

    <div id="header-links">
        <p>
            <a href="index/index/">首页</a>
            {if isset($_SESSION['uid'])}
            |<a href="admin/fbw">发博文</a> |
             <a href="admin/diary">日记管理</a> |
            <a href="admin/index">博文管理</a> |
            <a href="login/outlogin/">退出</a>
            {/if}
        </p>
    </div>

    <!--header ends-->
</div>

<div id="header-photo"><img src="public/images/header-photo.jpg" width="870" height="206" alt="header-photo" /></div>

<!-- navigation starts-->
<div  id="nav">
    <ul>
        <li id="current"><a href="index/index/">&nbsp&nbsp首页&nbsp&nbsp</a></li>
        <li><a href="index/news/">&nbsp&nbsp最新&nbsp</a></li>
        <li><a href="index/hots/">&nbsp&nbsp最热 &nbsp</a></li>

        <li><a href="index/about/">&nbsp&nbsp关于&nbsp&nbsp</a></li>
    </ul>&nbsp
    <!-- navigation ends-->
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <!--把所有资源路径定义到MyMVC下-->
    <base href="/MyMVC/" />
    <meta name="Description" content="Information architecture, Web Design, Web Standards." />
    <meta name="Keywords" content="your, keywords" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="Distribution" content="Global" />
    <meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
    <meta name="Robots" content="index,follow" />

    <link rel="stylesheet" href="public/css/fbw.css" type="text/css" />



    <title>首页</title>

</head>
<body>

<!-- wrap starts here -->
<div id="wrap">

    <!--header -->
    <?php include "./viewscache/fd36c072f809fe7005893261a605f6c4.php"?>

    <!-- content-wrap starts -->
    <div id="content-wrap">
        <div id="main">
            <h2>日记管理</h2>
            <?php if (!empty($diary_data)): ?>
            <?php foreach ($diary_data as $value): ?>
                <form action="admin/updatediary/" method="post">
                    <input type="hidden" name = 'id' value="<?=$value['id']; ?>">
                    标题:<input type="text" name="title" value="<?=$value['title']; ?>">
                    时间:<input type="text" name="time" value="<?=$value['time']; ?>"/>
                    顺序:<input type="text" name="sequence" value="<?=$value['sequence']; ?>"/><br/><br/>
                    内容:<textarea rows="7" cols="4" name="content"><?=$value['content']; ?></textarea><br/>
                    <input type="submit" value="更新"/>
                    <a href="admin/deldiary/did/<?=$value['id']; ?>/"><input type="button" value="删除"/></a>

                </form>
            <?php endforeach; ?>
            <?php endif; ?>


            <br/>

            <h2>添加日记</h2>
            <form action="admin/adddiary/" method="post">
                标题:<input type="text" name="title" ><br/><br/>
                时间:<input type="text" name="time"/><br/><br/>
                顺序:<input type="text" name="sequence"/><br/><br/>
                内容:<textarea rows="7" cols="4" name="content"></textarea><br/>
                <input type="submit" value="添加"/>

            </form>



            <!-- main ends -->
        </div>

        <!--右导航栏开始-->


        <!-- content-wrap ends-->
    </div>

    <!-- footer starts -->
    <div id="footer-wrap">



        <div id="footer-bottom">

            <p>
                &copy; 2010 <strong>Your Company</strong>

                &nbsp;&nbsp;&nbsp;&nbsp;

                <a href="http://www.cssmoban.com/" title="Website Templates">website templates</a> from <a href="http://www.cssmoban.com/">cssmoban.com</a> |
                Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> |
                <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <a href="index.html">Home</a>&nbsp;|&nbsp;
                <a href="index.html">Sitemap</a>&nbsp;|&nbsp;
                <a href="index.html">RSS Feed</a>
            </p>

        </div>

        <!-- footer ends-->
    </div>

    <!-- wrap ends here -->
</div>

</body>
</html>

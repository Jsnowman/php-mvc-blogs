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

    <link rel="stylesheet" href="public/css/index.css" type="text/css" />

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
            <?php foreach ($essay_data as $value): ?>
            <div>
                <!--文章显示块-->
                <a name="TemplateInfo"></a>
                <h2><a href="index/look/tid/<?=$value['tid']; ?>"><?=$value['title']; ?></a></h2>
                <p class="post-info">发表于:<?=$value['addtime']; ?></p>
                <p>
                    <?=$value['content']; ?>
                </p>


                <p class="postmeta">
                    <?php if (!$value['ishome']): ?>
                        <a href="admin/addhome/tid/<?=$value['tid']; ?>/" class="comments">放到首页</a>
                    <?php endif; ?>
                    <?php if ( $value['ishome']): ?>
                        <a href="admin/selecthome/tid/<?=$value['tid']; ?>/" class="comments">撤销主页</a>
                    <?php endif; ?>
                    <?php if (!$value['isdel']): ?>
                        <a href="admin/select/tid/<?=$value['tid']; ?>/" class="readmore">删除</a>
                    <?php endif; ?>
                    <?php if ($value['isdel']): ?>
                        <a href="admin/cxselect/tid/<?=$value['tid']; ?>/" class="readmore">撤销删除</a>
                    <?php endif; ?>

                </p>
            </div>
            <?php endforeach; ?>


            <!--页码-->
            <br><br>
            页码:
            <?php foreach ($page as $value): ?>
            <a href="<?=$value['a']; ?>">【<?=$value['p']; ?>】</a>
            <?php endforeach; ?>


            <!-- main ends -->
        </div>

        <!--右导航栏开始-->
        <?php include "./viewscache/925a7ce075971cc0bea53564b43190df.php"?>

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

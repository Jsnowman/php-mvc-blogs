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

    <!--引入md编辑器-->
    <link rel="stylesheet" href="public/editor/css/editormd.css" />
    <script src="public/editor/js/jquery.min.js"></script>
    <script src="public/editor/editormd.min.js"></script>
    <script type="text/javascript">
        $(function() {
            testEditor = editormd("test-editormd", {
                width   : "100%",
                height  : 640,
                syncScrolling : "single",
                path    : "public/editor/lib/"
            });

        });
    </script>


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

            <div>
                <form action="admin/addessay/" method="post">


                            标题:<input type="text" name="title"><br><br>


                                <div class="editormd" id="test-editormd">
                                    <textarea style="display:none;" name="content"></textarea>
                                </div>

                         <input type="submit" value="发表">

                </form>


            </div>


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

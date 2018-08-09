
<!DOCTYPE html>
<html >
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

<link rel="stylesheet" href="public/editor/css/editormd.preview.css" />






    <title>首页</title>

</head>
<body>

<!-- wrap starts here -->
<div id="wrap">

    <!--header -->
    {include 'head.php'}

    <!-- content-wrap starts -->
    <div id="content-wrap">

        <div id="main">

            <h1>{$essay_data['title']}</h1>


                <div id="markdown">
                    <textarea style="display:none;" name="test-editormd-markdown-doc">{$essay_data['content']}</textarea>
                </div>
                <script src="public/editor/js/jquery.min.js"></script>
            <script src="public/editor/lib/marked.min.js"></script>
            <script src="public/editor/lib/prettify.min.js"></script>
            <script src="public/editor/lib/raphael.min.js"></script>
            <script src="public/editor/lib/underscore.min.js"></script>
            <script src="public/editor/lib/sequence-diagram.min.js"></script>
            <script src="public/editor/lib/flowchart.min.js"></script>
            <script src="public/editor/lib/jquery.flowchart.min.js"></script>
            <script src="public/editor/editormd.js"></script>
            <script type="text/javascript">
                $(function() {
                    var testEditormdView;
                    testEditormdView = editormd.markdownToHTML("markdown", {
                        htmlDecode      : "style,script,iframe",
                        emoji           : true,
                        taskList        : true,
                        tex             : true,  // 默认不解析
                        flowChart       : true,  // 默认不解析
                        sequenceDiagram : true,  // 默认不解析
                    });
                });
            </script>


            

            <br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index/addzan/tid/{$essay_data['tid']}/addtype/1"><img style="width: " src="public/images/zan.png"></a>
            <a href="index/addzan/tid/{$essay_data['tid']}/addtype/2"><img src="public/images/cai.png"></a>



            


            



            <!-- main ends -->
        </div>

        <!--右导航栏开始-->
        {include 'right.php'}

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




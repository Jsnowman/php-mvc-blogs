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


    <style>
        #main{
            color: #FFFFFF;
        }
        #main h3{
            color: #FFFFFF;
            #5bc0de
        }
        #main h1{
            font-family: "微软雅黑", "Microsoft YaHei";
            color: #5bc0de;
        }
        .container {
            width: 800px;
            margin: 50px auto;
        }

        .vertical-timeline {
            color: #FFF;
            font-family: "微软雅黑", "Microsoft YaHei";
        }

        .vertical-timeline-block {
            width: 80%;
            border-left: 2px solid #DDD;
            margin: 0 20px;
            position: relative;
            padding-bottom: 30px;
        }

        /* 时间轴的左侧图标 */
        .vertical-timeline-icon {
            width: 40px;
            height: 40px;
            border-radius: 20px;
            position: absolute;
            left: -22px;
            top: 10px;

            text-align: center;
            line-height: 40px;
            cursor: pointer;
            transition: all 0.2s ease-in;
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
        }
        .vertical-timeline-block {
            cursor: pointer;
        }
        .vertical-timeline-block:hover .vertical-timeline-icon {
            width: 50px;
            height: 50px;
            border-radius: 25px;
            line-height: 50px;
            left: -27px;
            box-shadow: 0 0 5px #CCC;
            font-size: 25px;
        }

        /* 时间轴的左侧图标的各种样式 */
        .v-timeline-icon1 {
            background-color: #2aabd2;
        }
        .v-timeline-icon2 {
            background-color: #5cb85c;
        }
        .v-timeline-icon3 {
            background-color: #8c8c8c;
        }
        /* 时间轴的左侧图标上的序号*/
        .vertical-timeline-icon i {
            font-style: normal;
            color: #FFF;
        }
        /* 时间轴上的具体内容 */
        .vertical-timeline-content {
            background-color: #5bc0de;
            margin-left: 60px;
            padding: 20px 30px;
            border-radius: 5px;
            position: relative;
        }
        /* 时间轴上的具体内容左侧箭头 */
        .vertical-timeline-content:before {
            content: '';
            width: 0;
            height: 0;

            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-right: 10px solid #5bc0de;
            border-left: 10px solid transparent;

            position: absolute;
            right: 100%;
            top: 20px;
        }
        /* 时间轴的具体内容的格式 */
        .timeline-content {
            text-indent: 2em;
        }
        .time-more {
            overflow: hidden;
        }
        .time-more .time {
            float: left;
            line-height: 10px;
            display: inline-block;
        }
        .time-more .more {
            float: right;
        }
        .time-more .more a {
            display: inline-block;
            height: 20px;
            padding: 8px 15px;
            color: #FFF;
            text-decoration: none;
            font-size: 15px;
        }
        /* “更多信息”的风格 */
        .more-style1 {
            border-radius: 5px;
            background-color: #565656;
        }
        .more-style1:hover {
            background-color: #696969;
        }
        .more-style2 {
            border-radius: 5px;
            background-color: #1AB394;
        }
        .more-style2:hover {
            background-color: #18A689;
        }

        .more-style3 {
            border-radius: 5px;
            background-color: #1C84C6;
        }
        .more-style3:hover {
            background-color: #1A7BB9;
        }

    </style>





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
            <br>
            <br>
            <h1>●  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一个菜鸟的成长之路 </h1>
            <br>
            <br>
            <br>
            <?php foreach ($diary_data as $value): ?>
            <div class="vertical-timeline-block">
                <div class="vertical-timeline-icon v-timeline-icon<?=$value['style']; ?>">
                    <i class="icon"><?=$value['sequence']; ?></i>
                </div>

                <div class="vertical-timeline-content">
                    <h3><?=$value['title']; ?></h3>
                    <p class="timeline-content"><?=$value['content']; ?></p>
                    <p class="time-more">
                        <span class="time"><?=$value['time']; ?></span>

                    </p>
                </div>
            </div>
            <?php endforeach; ?>
            

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

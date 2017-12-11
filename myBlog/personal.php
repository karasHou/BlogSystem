<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>

    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/component.css"/>

    <!--[if IE]>
    <script src="js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container demo-1" style="position: relative">
    <div class="content" style="position: fixed; top: 0;">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
        </div>
    </div>

    <!--主体内容展示-->
    <div id="content"
         style="height: 1000px; width: 800px;margin: 0 auto;background: #fdfeff;z-index: 1000;position: relative;opacity: .2;">
        123---------------------------------------------
    </div>
    <!--主体内容展示-->

</div><!-- /container -->
<script src="js/TweenLite.min.js"></script>
<script src="js/EasePack.min.js"></script>
<script src="js/rAF.js"></script>
<script src="js/demo-1.js"></script>
</body>
</html>
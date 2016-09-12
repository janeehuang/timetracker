<!DOCTYPE html>
<!--[if lt IE 9]>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <title>Search</title>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <style>
        article,aside,figure,figcaption,footer,header,hgroup,menu,nav,section {display:block;}
        body {font: 140% "Lato", sans-serif; margin: 90px;}
    </style>
</head>
<body>
<div id="content" class="container">
    <div class="content">
        <a class="back" href=""></a>
        <form action="" method="post">
            ID:
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="id" >
            <input type="submit" name="enter" value="enter" style="font-size: 125px; width: 50px; height: 50px; text-align: center; ">
        </form>

    </div>
</div>

</body>
</html>
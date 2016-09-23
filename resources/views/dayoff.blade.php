
<!DOCTYPE html>
<!--[if lt IE 9]>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <title>新增假單</title>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <style>
        body{

            font-family: 'Open Sans', sans-serif;
            background:#FFFFFF;
            margin: 0 auto 0 auto;
            width:100%;
            text-align:center;
            margin: 20px 0px 20px 0px;
        }

        p{
            font-size:12px;
            text-decoration: none;
            color:#ffffff;
        }

        h1{
            font-size:1.5em;
            color:#000000;

        }

        .box{
            background:white;
            width:300px;
            border-radius:10px;
            margin: 140px auto 0 auto;
            padding:0px 0px 70px 0px;
            border: #FFFFFF 4px solid;
        }

        .email{
            background:#ecf0f1;
            border: #ccc 1px solid;
            border-bottom: #ccc 2px solid;
            padding: 8px;
            width:250px;
            color:#000000;
            margin-top:10px;
            font-size:1em;
            border-radius:4px;
        }

        .password{
            border-radius:4px;
            background:#ecf0f1;
            border: #ccc 1px solid;
            padding: 8px;
            width:250px;
            font-size:1em;
        }

        .btn{
            background:#2ecc71;
            width:268px;
            padding-top:5px;
            padding-bottom:5px;
            color:white;
            border-radius:4px;
            border: #FFFFFF 1px solid;

            margin-top:20px;
            margin-bottom:20px;
            float:left;
            margin-left:16px;
            font-weight:800;
            font-size: 15px;
        }

        .btn:hover{
            background:#FFFF00;
        }

        #btn2{
            float:left;
            background:#FF0000;
            width:125px;  padding-top:5px;
            padding-bottom:5px;
            color:white;
            border-radius:4px;
            border: #FFFFFF 1px solid;

            margin-top:20px;
            margin-bottom:20px;
            margin-left:10px;
            font-weight:800;
            font-size: 15px;;
        }

        #btn2:hover{
            background:#FFFF00;
        }

    </style>
</head>
<body>
<form method="post" action="{{'dayoff'}}">
    <div class="box">
        <h1>假單</h1>
        <form action="" method="post">


            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input id="datepicker1" type="text" name="hap_time" placeholder="請假日期" class="email"/><br>

            假別：<input name="dayoff_type" type="radio" value="病假">病假

            <input  name="dayoff_type" type="radio" value="休假">休假

            <input name="dayoff_type" type="radio" value="事假">事假

            <input name="dayoff_type" type="radio" value="公假">公假<br>

            <textarea name="reason" id="" cols="30" rows="10" class="email" placeholder="原因"></textarea>

            <input type="submit" value="我要請假" class="btn btn-primary" name="insert">



            <!-- End Btn -->
        </form>

        <script language="JavaScript">
            $(document).ready(function(){
                var opt={dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
                    dayNamesMin:["日","一","二","三","四","五","六"],
                    monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
                    monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
                    prevText:"上月",
                    nextText:"次月",
                    weekHeader:"週",
                    showMonthAfterYear:true,
                    dateFormat:"yy-mm-dd"
                };
                $("#datepicker1").datepicker(opt);
            });
        </script>
</body>
</html>
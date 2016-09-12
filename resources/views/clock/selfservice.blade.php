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
        body {font: 120% "Lato", sans-serif; margin: 90px;}
    </style>
</head>
<body>
<div id="content" class="container">
    <div class="content">
        <a class="back" href=""></a>
        <span class="title">{{$rs['bgn']}} - {{$rs['end']}}</span>
        <form action="/clock/selfservice" method="get" name="own">
            <input id="datepicker1" type="text" name="q" placeholder="yy-mm-dd"/>~<input id="datepicker2" type="text" name="e" placeholder="yy-mm-dd"/>
            <br>

        <input type="text"  name="uid" placeholder="user id"/>
            <button type="submit">Search</button>
            </form>

        <div class="fs">
                @if( $rs['list']!=null )
                    @foreach ($rs['list'] as $var_s)
                        <div>
                            <a href="{{'clock.index', ['id' => $var_s->u_id] }}">{{$var_s->created_at}}</a>
                        </div>
                    @endforeach

                @endif
            </div>


    </div>
</div>
<script language="JavaScript">
    $(document).ready(function(){
        $.datepicker.regional['zh-TW']={
            dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
            dayNamesMin:["日","一","二","三","四","五","六"],
            monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
            monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
            prevText:"上月",
            nextText:"次月",
            weekHeader:"週"
        };
        $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
        $("#datepicker1").datepicker({dateFormat:"yy-mm-dd",showMonthAfterYear:true});
        $("#datepicker2").datepicker({dateFormat:"yy-mm-dd",showWeek:true});
    });
</script>
</body>
</html>
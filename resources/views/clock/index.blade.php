<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TimeTracker</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }
        .title {
            font-size: 96px;
            color: #000000;
        }


        .leftbar {
            float: left;
            width: 300px;
            background-color: #EAEAEA;
            height: 530px;
            position: absolute;
            z-index: -1;
            border-radius: 40px;
            font-size: 63px;
            text-align: center;
        }


    </style>
</head>
<body>
<div class="container" style="width: 100%">
    <div>

        <div class="col-md-3">
            <div class="leftbar">Hi，<br>
                <br>
                <script language="javascript">
                    var Today=new Date();
                    document.write( Today.getFullYear()  + " Y " + '<br>'
                             + (Today.getMonth()+1) + " M " + Today.getDate() + " D");
                </script>
            </div>

        </div>


        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8">
                    <center><div class="title" id="clockDisplay"></div></center>
                </div>
                <div class="col-md-4"><center><br>
                        <form action="{{'show'}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="action_typ" value="on">
                            <input type="submit" value="Work on" class="btn btn-danger" name="workon">
                        </form>
                        <br>
                        <form action="{{'show'}}" method="post" style="align-items: center">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="action_typ" value="off">
                            <input type="submit" value="Work off" class="btn btn-primary" name="workoff">
                        </form>
                    </center><br>
                    <a href="{{'goSearch'}}"><input type="btn" class="btn btn-warning" value="search"/></a>
                    {{--<a href="{{'clock/view'}}"><input type="btn" class="btn btn-default" value="回上頁"/></a>--}}
                </div>
            </div>

            <div class="row" style="font-size: 45px">
                <div class="col-md-6">
                    <td style="text-align: center">
                        @foreach($rs["workon"] as $var)
                            {{ $var -> created_at}}<br>
                        @endforeach</td>
                </div>
                <div class="col-md-6">
                    <td style="text-align: center">
                        @foreach($rs["workoff"] as $var_wf)
                            {{ $var_wf -> created_at}}<br>
                        @endforeach</td>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" language="JavaScript">

    function renderTime () {
        var currentTime = new Date();
        var diem = "AM";
        var h =currentTime.getHours();
        var m =currentTime.getMinutes();
        var s =currentTime.getSeconds();

        if(h == 0){
            h =12;
        }else if (h > 12){
            h=h-12;
            diem ="PM";
        }
        if (10 > h){
            h="0"+h;
        }
        if (10 > m){
            m="0"+m;
        }
        if (10 > s){
            s="0"+s;
        }

        var myClock = document.getElementById('clockDisplay');
        myClock.textContent = h + ":" + m + ":" + s + " " + diem;
        myClock.innerHTML = h + ":" + m + ":" + s + " " + diem;
        setTimeout('renderTime()',1000);

    }
    renderTime();

</script>

</body>
</html>
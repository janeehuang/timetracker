<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Welcome</title>
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);


        body {
            background-color: #FFFFFF;
            font-family: "Lato", helvetica, arial, sans-serif;
            font-size: 16px;
            font-weight: 900;
            text-rendering: optimizeLegibility;
            text-align: center;
        }

        div.table-title {
            display: block;
            margin: auto;
            max-width: 600px;
            padding:5px;
            width: 100%;
        }

        .table-title h3 {
            color: #4E5066;
            font-size: 30px;
            font-weight: 400;
            font-style:normal;
            font-family: "Lato", helvetica, sans-serif;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            text-transform:uppercase;
        }


        /*** Table Styles **/

        .table-fill {
            background: white;
            border-radius:3px;
            border-collapse: collapse;
            height: 320px;
            margin: 190px;
            max-width: 600px;
            padding:5px;
            width: 100%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            animation: float 5s infinite;
        }

        th {
            color:#000000;;
            background:#FFFFBB;
            border-bottom:4px solid #9ea7af;
            border-right: 1px solid #343a45;
            font-size:23px;
            font-weight: 100;
            padding:24px;
            text-align:left;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            vertical-align:middle;

        }

        th:first-child {
            border-top-left-radius:3px;
        }

        th:last-child {
            border-top-right-radius:3px;
            border-right:none;
        }

        tr {
            border-top: 1px solid #C1C3D1;
            border-bottom-: 1px solid #C1C3D1;
            color:#000000;
            font-size:16px;
            font-weight:normal;
            text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
        }

        tr:hover td {
            background:#4E5066;
            color:#000000;
            border-top: 1px solid #22262e;
            border-bottom: 1px solid #22262e;

        }

        tr:first-child {
            border-top:none;
        }

        tr:last-child {
            border-bottom:none;
        }

        tr:nth-child(odd) td {
            background:#EBEBEB;
        }

        tr:nth-child(odd):hover td {
            background:#F0F8FF;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius:3px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius:3px;
        }

        td {
            background:#FFFFFF;
            padding:20px;
            text-align:left;
            vertical-align:middle;
            font-weight:300;
            font-size:18px;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #C1C3D1;
        }

        td:last-child {
            border-right: 0px;
        }

        th.text-left {
            text-align: center;
        }



        td.text-left {
            text-align: center;
        }
        td.text-align{
            text-align: center;
            font-size: 30px;
        }
        .btn{
            background:#FF0000;
            width:200px;
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
        .btn2{
            background:#00bbFF;
            width:200px;
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
        .btn3{
            background:#FFBB00;
            width:200px;
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
            text-align: center;
        }

        .btn4{
            background:#000000;
            width:200px;
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
            text-align: center;
        }



    </style>

</head>

<body>
<div class="table-title">
    <h3>It's @foreach($u_rs['u_nm'] as $var)
            {{ $var -> u_name}}

        @endforeach の TimeTracker</h3>
    <br><center><div class="table-title" id="clockDisplay"></div></center>
</div>
<table class="table-fill">
    <thead>
    <tr>
        <th class="text-left"><script language="javascript">
                var Today=new Date();
                document.write( Today.getFullYear()  + " 年 ");
            </script>
        </th>
        <th class="text-left">WorkOn Time</th>
        <th class="text-left">WorkOff Time</th>
        <th class="text-left">DayOff List</th>

    </tr>
    </thead>
    <tbody class="table-hover">

    </tbody>

    <tbody class="table-hover">
    <tr>
        <td class="text-align">
            <script language="javascript">
                var Today=new Date();
                document.write((Today.getMonth()+1) + " 月 " + Today.getDate() + " 日 ");
            </script>
        </td>
        <td class="text-left">@foreach( $u_rs['wn'] as $var_wn)
                {{$var_wn->created_at}} <hr>
            @endforeach</td>
        <td class="text-left">@foreach( $u_rs['wf'] as $var_wf)
                {{$var_wf->created_at}}
                <hr>
            @endforeach</td>
        <td class="text-left">@foreach( $u_rs['dayoff'] as $var_wn)
                {{$var_wn->leave_day}} &nbsp;  {{$var_wn->leave_typ}} <hr>
            @endforeach</td></td>
    </tr>
    <tr>
        <td class="text-left"><a href=""><input type="btn" class="btn4 btn-default" value="回上一頁"/></a> </td>
        <td class="text-left">
            <form action={{'show'}} method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="action_typ" value="on">
                <input type="submit" value="Work on" class="btn btn-danger" name="workon">
            </form></td>
        <td class="text-left"><form action="{{'show'}}" method="post" style="align-items: center">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="action_typ" value="off">
                <input type="submit" value="Work off" class="btn2 btn-primary" name="workoff">
            </form></td>
        <td class="text-left"><a href="{{'dayoff'}}"><input type="btn" class="btn3 btn-warning" value="DayOff"/></a></td>
    </tr>

    </tbody>
</table>
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
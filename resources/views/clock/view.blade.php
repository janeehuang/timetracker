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
            background-color: #AAFFEE;
            font-family: "Lato", helvetica, arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
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
            margin: auto;
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

    </style>

</head>

<body>
<div class="table-title">
    <h3>It's @foreach($u_rs['u_nm'] as $var)
            {{ $var -> u_name}}
        @endforeach の TimeTracker</h3>
</div>
<table class="table-fill">
    <thead>
    <tr>
        <th class="text-left">Today WorkOn Time</th>
        <th class="text-left">Today WorkOff Time</th>
    </tr>
    </thead>
    <tbody class="table-hover">
    <tr>
        <td class="text-left">@foreach($u_rs["wn"] as $var)
                {{ $var -> created_at}}<br>
            @endforeach</td>
        <td class="text-left">@foreach($u_rs["wf"] as $var_off)
                {{ $var_off -> created_at }}
            @endforeach</td>
    </tr>
    </tbody>
    <thead>
    <tr>
        <th class="text-left">WorkOn Time</th>
        <th class="text-left">WorkOff Time</th>
    </tr>
    </thead>
    <tbody class="table-hover">
    <tr>
        <td class="text-left">@foreach( $u_rs["u_wn"] as $var_wn)
                {{$var_wn->workon}} <hr>
        @endforeach</td>
        <td class="text-left">@foreach( $u_rs["u_wf"] as $var_wf)
                {{$var_wf->workoff}}
                <hr>
            @endforeach</td>
    </tr>
    <tr>
        <td class="text-left"><a href=""><input type="btn" class="btn btn-warning" value="回上一頁"/></a> </td>
        <td class="text-left"><a href="clock/index"><input type="btn" class="btn btn-primary" value="我要打卡"/></a></td>
    </tr>

    </tbody>
</table>


</body>
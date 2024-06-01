<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entry Pass for {{$member->company_name}}</title>
    <style>
        @page {
            size: 3.5in 5in;
            margin: 0;
            padding: 0;
        }

        html {
            margin: 0
        }

        body {
            margin: 0;
            padding: 0;
        }

        .bg_card {
            width: 100%;
            height: 100%;
        }

        .container {
            position: relative;
            text-align: center;
        }

        .name {
            position: absolute;
            bottom: 252px;
            width: 100%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 14px;
        }

       /* .qr_code {
            position: absolute;
            top: 118px;
            left: 113px;
        }*/

        .reg_id {
            position: absolute;
            bottom: 234px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{public_path('/images/pass_id.jpg')}}" class="bg_card" alt="">
    {{--<div class="qr_code">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::size(110)->generate(sprintf('%04d',$member->reg_id))) !!} ">
    </div>--}}
    <div class="name"><strong>{{ucwords(strtolower($member->name))}}</strong></div>
    <div class="reg_id">ID: {{sprintf('%04d',$member->reg_id)}}</div>
</div>
</body>
</html>

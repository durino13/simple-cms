<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
    <link rel="stylesheet" href="/assets/all.css">
    <link rel="stylesheet" href="/plugins/chosen-npm/public/chosen.css">
    <style type="text/css">
        .js #fouc {display:none;}
    </style>
    <script type="text/javascript">
        document.documentElement.className = 'js';
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

{{--Header--}}
@include('admin.common.header')

<!-- Left side column. contains the sidebar -->
@include('admin.common.left-menu')

<!-- Site wrapper -->
<div id="fouc" class="wrapper">

    {{--Main content--}}
    <div class="content-wrapper">
        @yield('content')
    </div>

    {{--Footer--}}
    @include('admin.common.footer')

</div>

<script src="/plugins/jquery/dist/jquery.min.js"></script>
<script src="/plugins/chosen-npm/public/chosen.jquery.js"></script>
<script src="/assets/global.js"></script>
<script src="/assets/admin.all.js"></script>

<script type="text/javascript">
    document.getElementById("fouc").style.display = "block";
</script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
    <link rel="stylesheet" href="/assets/admin.all.css">
    <link rel="stylesheet" href="/plugins/chosen-npm/public/chosen.css">
    <style type="text/css">
        .js #fouc {display:none;}
    </style>
    <script type="text/javascript">
        document.documentElement.className = 'js';
    </script>
    {{-- Global javascript variables --}}
    <script>
        <?php

            /*
            |--------------------------------------------------------------------------
            | Config sharing between PHP and javascript
            |--------------------------------------------------------------------------
            |
            | This stuff will share PHP configuration with javascript. The javascript
            | configuration is stored on the server in config/javascript.php file.
            |
            */

        $index = 1;
        $val = '';
        $namespaces = config('javascript');
        foreach ($namespaces as $namespace => $vars) {
            $val = '';
            foreach ($vars as $key => $var) {
                if (is_array($var)) {
                    $val .= "[";
                    foreach ($var as $k => $v) {
                        $val .= json_encode($v);
                        if (sizeof($var) > $index) {
                            $val .= ',';
                        }
                        $index++;
                    }
                    $val .= "]";
                } else {
                    $val = json_encode($var);
                }
                echo 'var '.$namespace.'_'.$key.' = '.$val.';';
            }
        }

        ?>
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div id="app">
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
    </div>

    <?php

        /*
         * Here we will read the filename from stats.json, because our filenames contain file hash and the file names
         * will differ ..
         */

        $json_contents = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/public/assets/manifest.json'), true);
        $admin_bundle_name = $json_contents['/public/assets/admin.js'];

    ?>

    <script src="/plugins/jquery/dist/jquery.min.js"></script>
    <script src="/plugins/chosen-npm/public/chosen.jquery.js"></script>
    <script src="{{ $admin_bundle_name }}"></script>

    <script type="text/javascript">
        document.getElementById("fouc").style.display = "block";
    </script>

</body>
</html>

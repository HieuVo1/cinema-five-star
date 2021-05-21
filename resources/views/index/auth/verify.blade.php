<html lang="en" class="full-height">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <base href="{{asset("")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="asset/index/md/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="asset/index/md/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="asset/index/md/css/style.css" rel="stylesheet">

    <style>
        .form-elegant .font-small {
            font-size: 0.8rem;
        }

        .form-elegant .z-depth-1a {
            -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
            box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
        }

        .form-elegant .z-depth-1-half,
        .form-elegant .btn:hover {
            -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
            box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
        }
    </style>
</head>
<body>
<div style="height: 100vh; display: flex; align-items: center;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <section class="form-elegant">

                    <!--Form without header-->
                    <div class="card">

                        <div class="card-body mx-4">

                            <!--Header-->
                            <div class="text-center">
                                <h3 class="dark-grey-text mb-5"><strong>Reset password</strong></h3>
                            </div>
                            <form action="{{route('index.verify.post')}}" method="post">
                                {{csrf_field()}}
                                <!--Body-->
                                <div class="md-form">
                                    <input type="text" id="code" name="code" class="form-control">
                                    <label for="code">Your Code</label>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">
                                        Go to reset
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer mx-5 pt-3 mb-1">
                            <p class="font-small grey-text d-flex justify-content-end">Không phải là thành viên? <a
                                        href="{{route('index.register.get')}}"
                                        class="blue-text ml-1">
                                    Đăng ký ngay</a></p>
                        </div>

                    </div>
                    <!--/Form without header-->

                </section>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="asset/index/md/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="asset/index/md/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="asset/index/md/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="asset/index/md/js/mdb.min.js"></script>

</body>
</html>
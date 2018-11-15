
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/css/theme.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashkit</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                登录
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">

            </p>

            <!-- Form -->
            <form action="{{route('login')}}" method="post">
                @csrf
                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>邮箱账号</label>

                    <!-- Input -->
                    <input type="email" name="email" class="form-control" placeholder="请输入邮箱">

                </div>

                <!-- Password -->
                <div class="form-group">

                    <div class="row">
                        <div class="col">

                            <!-- Label -->
                            <label>密码</label>

                        </div>
                        <div class="col-auto">

                            <!-- Help text -->
                            <a href="{{route('password_reset')}}" class="form-text small text-muted">
                                忘了密码?
                            </a>

                        </div>
                    </div> <!-- / .row -->

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password" name="password" class="form-control form-control-appended" placeholder="请输入密码">

                        <!-- Icon -->
                        <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                        </div>

                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                   登录
                </button>

                <!-- Link -->
                <p class="text-center">
                    <small class="text-muted text-center">
                        还没账号? <a href="{{route('register')}}">去注册</a>.
                        <a href="{{route('index')}}">返回首页</a>
                    </small>
                </p>

            </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

            <!-- Image -->
            <div class="bg-cover vh-100 mt--1 mr--3" style="background-image: url({{asset('org/Dashkit-1.1.2/dist/assets')}}/img/covers/auth-side-cover.jpg);"></div>

        </div>
    </div> <!-- / .row -->
</div>

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('code.send')}}',
            //验证码等待发送时间
            timeout: 10,
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]',
            //发送前执行的动作，返回true时将发送（可不设置）
            before: function () {
                return true;
            }
        }
        hdjs.validCode(option);
    })
</script>


</body>
</html>
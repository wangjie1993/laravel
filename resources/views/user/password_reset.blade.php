
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/fonts/feather/feather.min.css">
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
               修改密码
            </h1>

            <!-- Subheading -->

            <!-- Form -->
            <form method="post" action="{{route('password_reset')}}">
                @csrf
                <div class="form-group">
                    <!-- Label -->
                    <label>
                        邮件
                    </label>
                    <!-- Input -->
                    <input type="email" value="332171306@qq.com" name="email" class="form-control" placeholder="请输入邮箱">
                </div>
                <div class="form-group">
                    <!-- Label -->
                    <label>
                        新密码
                    </label>
                    <!-- Input -->
                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                </div>
                <div class="form-group">
                    <!-- Label -->
                    <label>
                        确认密码
                    </label>
                    <!-- Input -->
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请输入确认密码">
                </div>
                <div class="form-group">
                    <!-- Label -->
                    <label>
                        验证码
                    </label>
                    <!-- Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="请输入验证码" name="code" value="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                   确定
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                       <a href="{{route('login')}}">去登录</a>.
                    </small>
                </div>

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


<!-- Theme JS -->
{{--<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/js/theme.min.js"></script>--}}
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('util.code.send')}}',
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
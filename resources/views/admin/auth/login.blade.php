<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sessão</title>

    @php
        use App\Models\System;
        $title = System::get()->first();

        if ($title == null) {
             $title = System::create();
            }
        
        // $title = System::get()->first();
    @endphp

    <!-- Main CSS-->
    {!! Html::style('css/main.css') !!}

</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            {{-- @if ($about)
        <h1>{{$about->name}}</h1>
            
        @else --}}

            <h1>{{$title->name}}</h1>

            {{-- @endif --}}
        </div>
        <div class="login-box" style="min-height: 415px;">
            <form class="login-form" method="POST" action="{{ route('login.validate_data') }}">
                @csrf
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                @if ($errors->has('email') || $errors->has('password') || session('invalid'))
                    <div class="text-center pb-1">
                        <span style="color: red">Nome de usuário ou senha inválidos.</span>
                    </div>
                @endif


                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email" name="email" id="email"
                        autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remember_token"><span class="label-text">Manter-se
                                    conectado</span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Redefinir Senha?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
            <form class="forget-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Redefinir Senha?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email" name="email" id="email">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>REDIFINIR</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i
                                class="fa fa-angle-left fa-fw"></i> Voltar ao Login</a></p>
                </div>
            </form>
        </div>
    </section>

    <!-- Essential javascripts for application to work-->
    {!! Html::script('js/jquery-3.3.1.min.js') !!}
    {{-- <script src="js/jquery-3.3.1.min.js"></script> --}}
    {!! Html::script('js/popper.min.js') !!}
    {{-- <script src="js/popper.min.js"></script> --}}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/main.js') !!}
    <!-- The javascript plugin to display page loading on top-->
    {!! Html::script('js/plugins/pace.min.js') !!}
    <!-- Page specific javascripts-->
    {!! Html::script('js/fontawesome.js') !!}


    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration </title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
    <body>
        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img src="{{ asset('images/frontImg.jpg')}}" alt="">
                    {{-- <div class="text">
                        <span class="text-1">Every new friend is a <br> new adventure</span>
                        <span class="text-2">Let's get connected</span>
                    </div> --}}
                </div>
                <div class="back">
                    {{-- <img class="backImg" src="images/backImg.jpg" alt=""> --}}
                    <div class="text">
                        <span class="text-1">Complete miles of journey <br> with one step</span>
                        <span class="text-2">Let's get started</span>
                    </div>
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Login</div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="text" placeholder="Enter your email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @error('email')
                                    <span class="error_span">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" placeholder="Enter your password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="error_span">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="text"><a href="#">Forgot password?</a></div>
                                <div class="button input-box">
                                    <input type="submit" value="Sumbit">
                                </div>
                                <div class="text sign-up-text">Don't have an account? <label for="flip">Sign Up now</label></div>
                            </div>
                        </form>
                    </div>

                    <div class="signup-form">
                        <div class="title" id="title_div">Sign Up</div>
                            {{-- <form method="POST" action="{{ route('register') }}">
                                @csrf --}}
                                <div class="input-boxes" id="sign_up_div">
                                    <div class="input-box">
                                        <i class="fas fa-user"></i>
                                        <input type="text" placeholder="Enter your name" id="name2" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    </div>
                                    <div class="input-box">
                                        <i class="fas fa-envelope"></i>
                                        <input placeholder="Enter your email" id="email2" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>

                                    <div class="input-box">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" placeholder="Enter your password" id="password2" name="password" required>
                                    </div>

                                    <div class="input-box">
                                        <i class="fas fa-lock"></i>
                                        <input id="password-confirm" placeholder="Confirm your password" id="password2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    {{-- @error('password') --}}
                                        <span class="error_span">
                                            <strong id="register_error"></strong>
                                        </span>
                                    {{-- @enderror --}}

                                    <div class="button input-box">
                                        <input type="submit" value="Sumbit" onclick="register()">
                                    </div>
                                    <div class="flex-m w-full p-b-33">
                                        <div class="contact100-form-checkbox">
                                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                            <label class="label-checkbox100" for="ckb1">
                                                <span class="txt1">
                                                    I agree to the
                                                    <a href="#" class="txt2 hov1">
                                                    Terms of User
                                                    </a>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                                </div>

                                <div class="input-boxes" id="validation_div" style="display: none;">
                                    <div class="input-box">
                                        <i class="fas fa-key"></i>
                                        <input type="text" placeholder="Enter Code" id="validation_code" name="validation_code"  required>
                                    </div>
                                    <span class="error_span">
                                        <strong id="code_error"></strong>
                                    </span>
                                    <div class="text"><a href="#" onclick="register()">didn't receive the code ? resend</a></div>

                                    <div class="button input-box">
                                        <input type="submit" value="Continue" onclick="continueRegister()">
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        <div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function register()
            {
                email = $('#email2').val();
                password = $('#password2').val();
                confirm_pass = $('#password-confirm').val();
                name = $('#name2').val();
                accept = $('#ckb1').is(':checked');

                var data = {
                    "_token": "{{ csrf_token() }}",
                    "email":email,
                    "password":password,
                    "confirm_pass":confirm_pass,
                    "name":name,
                    "accept":accept
                };

                jQuery.ajax({
                    url: "{{url('/registerM')}}",
                    method: "POST",
                    data: data,

                    success: function(response)
                    {
                        if(response.success)
                        {
                            $('#title_div').text('Validation Code');
                            $('#sign_up_div').hide();
                            $('#validation_div').show();
                        }
                        else
                        {
                            $('#register_error').text(response.msg);
                            // toastr.error(response.msg);
                        }
                    },
                    error: function(response)
                    {
                        toastr.error('Big Error');
                    }
                });
            }

            function continueRegister()
            {
                validation_code = $('#validation_code').val();
                email = $('#email2').val();
                password = $('#password2').val();
                name = $('#name2').val();

                var data = {
                    "_token": "{{ csrf_token() }}",
                    "email":email,
                    "password":password,
                    "name":name,
                    "validation_code":validation_code
                };

                jQuery.ajax({
                    url: "{{url('/continueRegister')}}",
                    method: "POST",
                    data: data,

                    success: function(response)
                    {
                        if(!response.success)
                        {
                            toastr.error(response.msg);
                            $('#code_error').text(response.msg);
                        }
                        else
                        {
                            toastr.success(response.msg);
                            setTimeout(() => {
                                window.location.href = '{{ route("login") }}';
                            }, 500);
                        }
                    },
                    error: function(response)
                    {
                        toastr.error('Big Error');
                    }
                });
            }
        </script>
    </body>
</html>
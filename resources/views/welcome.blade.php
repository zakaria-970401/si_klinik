<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SI KLINIK</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/js/config.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style type="text/css">
        .hide {
            display: none;
        }
    </style>
</head>


<body>
    <main class="main" id="top">

        <section class="light">
            <div class="bg-holder overlay"
                style="background-image:url(../assets/img/generic/bg-2.jpg);background-position: center top;">
            </div>
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <p class="fs-3 fs-sm-4 text-white">SI KLINIK</p>
                        @if (!Auth::guest())
                            <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2"
                                href="{{ route('home') }}">Home</a>
                        @else
                            <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2"
                                href="#login-modal" data-bs-toggle="modal">Start Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-dark pt-8 pb-4 light">
            <div class="container">
                <div class="position-absolute btn-back-to-top bg-dark"><a class="text-600" href="#banner"
                        data-bs-offset-top="0" data-scroll-to="#banner"><span class="fas fa-chevron-up"
                            data-fa-transform="rotate-45"></span></a></div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 class="text-uppercase text-white opacity-85 mb-3">lorem</h5>
                        <p class="text-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis perspiciatis deserunt
                            magnam quaerat, excepturi, quasi sed esse consequuntur nulla, iste in numquam incidunt
                            laboriosam consectetur distinctio totam dolorum modi eum.
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <h5 class="text-white opacity-85 mb-3">Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Aperiam nobis nisi corporis, magnam est, dignissimos ullam sapiente modi
                            necessitatibus aliquid nam minima quibusdam sint ducimus nulla ipsum fugit facilis
                            voluptate!</h5>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label"
        aria-hidden="true">
        <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
                <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                    <div class="position-relative z-index-1 light">
                        <h4 class="mb-0 text-white" id="authentication-modal-label">FORM LOGIN</h4>
                    </div>
                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 px-5">
                    <form id="form-login">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="modal-auth-email">Email address</label>
                            <input class="form-control" type="email" autocomplete="on" id="email" autofocus="on"
                                placeholder="Masukan E-mail" name="email" />
                        </div>
                        <div class="row gx-2">
                            <div class="mb-3">
                                <label class="form-label" for="modal-auth-password">Password</label>
                                <input class="form-control Password" type="password" autocomplete="off" id="password"
                                    placeholder="Masukan Password" name="password" />
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showPass" />
                            <label class="form-label" for="modal-auth-register-checkbox"> Show Password </label>
                        </div>
                        <div class="btnSubmit">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit">Log
                                in
                            </button>
                        </div>
                        <div class="btnLoader hide">
                            <button class="btn btn-primary d-block w-100" type="button" disabled="">
                                <span class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    {{-- <script src="{{ asset('assets/vendors/popper/popper.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendors/anchorjs/anchor.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendors/is/is.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendors/swiper/swiper-bundle.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendors/typed.js/typed.js') }}"></script> --}}
    <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendors/lodash/lodash.min.js') }}"></script> --}}
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('assets/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function logout() {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Nanti Dulu,'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ route('post-logout') }}";
                }
            })
        }


        $('#showPass').on('click', function() {
            var passInput = $(".Password");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        });

        $('#form-login').submit(function(e) {
            e.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();
            data: $('#form-login').serialize(),
                $('.btnSubmit').addClass('hide');
            $('.btnLoader').removeClass('hide');
            $.ajax({
                url: "{{ route('doLogin') }}",
                type: "POST",
                datatype: "JSON",
                data: {
                    email: email,
                    password: password,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '1') {
                        window.location.href = "{{ route('home') }}";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Username Atau Password Salah!',
                        });
                        $('.btnSubmit').removeClass('hide');
                        $('.btnLoader').addClass('hide');
                    }
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'Ada Kesalahan Sistem, Silahkan Refresh Halaman!',
                    });
                    $('.btnSubmit').removeClass('hide');
                    $('.btnLoader').addClass('hide');
                }
            });
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Web_Assignment</title>
        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        />
        <!-- Google Fonts -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        />
        <!-- Bootstrap core CSS -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <!-- Material Design Bootstrap -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            id="wsl-widget-css"
            href="https://mdbcdn.b-cdn.net/wp-content/plugins/wordpress-social-login/assets/css/style.css?ver=5.6.2"
            type="text/css"
            media="all"
        />
        <link
            rel="stylesheet"
            id="compiled.css-css"
            href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/compiled-4.19.2.min.css?ver=4.19.2"
            type="text/css"
            media="all"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        />
        <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
        />
        <link rel="stylesheet" href="{{ asset('backend/admin.css') }}" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 sidebar d-block">
                    <div class="head">
                        <img src="/images/K.png" style="width: 40px" alt="" />

                        <b class="side-head">Admin Panel</b>
                    </div>
                    <div class="container-fluid page-body-wrapper mt-4">
                        <!-- partial:partials/_sidebar.html -->
                        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                            <ul class="nav d-block">
                                <li class="nav-item">
                                    <a
                                        class="nav-link @yield('item-active')"
                                        href="{{ route('items.index') }}"
                                    >
                                        <span class="menu-title"
                                            ><i class="bi bi-grid"></i
                                            >&nbsp;Items</span
                                        >
                                    </a>
                                </li>
                                <li class="nav-item mt-3">
                                    <a
                                        class="nav-link @yield('cat-active')"
                                        href="{{ route('category.index') }}"
                                    >
                                        <i class="mdi mdi-home menu-icon"></i>
                                        <span class="menu-title"
                                            ><i class="bi bi-list-task"></i
                                            >&nbsp;Category</span
                                        >
                                    </a>
                                </li>
                                <li class="nav-item logout">
                                    <a
                                        class="nav-link"
                                        href="{{ url('/admin/logout') }}"
                                    >
                                        <span class="menu-title"
                                            ><i
                                                class="bi bi-box-arrow-right"
                                            ></i
                                            >&nbsp;Logout</span
                                        >
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-md-9 mb-3">
                    <div class="row d-flex justify-content-between mt-4">
                        <div class="col-md-3">
                            <button
                                class="navbar-toggler navbar-toggler align-self-center"
                                type="button"
                                data-toggle="minimize"
                            >
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                        <div class="col-md-1">
                            <img
                                src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                alt="profile"
                                style="width: 40px"
                            />
                        </div>
                    </div>
                    <hr />
                    @include('inc.error')@yield('content')
                </div>
            </div>
        </div>

        <!-- JQuery -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        ></script>
        <!-- Bootstrap tooltips -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"
        ></script>
        <!-- Bootstrap core JavaScript -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
        ></script>
        <!-- MDB core JavaScript -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"
        ></script>
        <script type="text/javascript">
            document.getElementById(
                "alert"
            ).innerHTML = `@include('inc.error')`;
            setTimeout(function () {
                document.getElementById("alert").innerHTML = "";
            }, 3000);
        </script>
    </body>
    @yield('script')
</html>

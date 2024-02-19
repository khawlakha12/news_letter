<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/journal.css') }}" />

    <style>
                .upload-container {
            background-color: rgb(239, 239, 239);
            border-radius: 6px;
            padding: 10px;
        }

        .border-container {
            border: 5px dashed rgba(198, 198, 198, 0.65);
            /*   border-radius: 4px; */
            padding: 20px;
        }

        .border-container p {
            color: #130f40;
            font-weight: 600;
            font-size: 1.1em;
            letter-spacing: -1px;
            margin-top: 30px;
            margin-bottom: 0;
            opacity: 0.65;
        }

        #file-browser {
            text-decoration: none;
            color: rgb(22, 42, 255);
            border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
        }

        #file-browser:hover {
            color: rgb(0, 0, 255);
            border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
        }

        .icons {
            color: #95afc0;
            opacity: 0.55;
        }
        .wrapper {

            display: flex;
            justify-content: center;
            align-items: center;

        }

        #news-slider {
            display: grid;
            margin: 0 auto;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 80px;
            justify-content: center;
            align-items: center;
        }

        #selectBankList {
            display: block;
            background: #fff;
            margin: 0 auto;
            width: 50%;
        }
        .post-slide:hover .post-img img {
            transform: scale(1.1, 1.1);
        }

        .post-slide .over-layer {
            width: 400px;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background: linear-gradient(-45deg,
                    #06bef4bf 0%,
                    rgba(45, 112, 253, 0.6) 100%);
            transition: all 0.5s linear;
        }

        .post-slide:hover .over-layer {
            opacity: 1;
            text-decoration: none;
        }

        .post-slide .over-layer i {
            position: relative;
            top: 45%;
            text-align: center;
            display: block;
            color: #ffffff;
            font-size: 25px;
        }
        .post-slide .post-title a:hover {
            text-decoration: none;
            color: #3498db;
        }

        .post-slide .read-more {
            padding: 7px 20px;
            float: right;
            font-size: 12px;
            background: #2196f3;
            color: #ffffff;
            box-shadow: 0px 10px 20px -10px #1376c5;
            border-radius: 25px;
            text-transform: uppercase;
        }

        .post-slide .read-more:hover {
            background: #3498db;
            text-decoration: none;
            color: #fff;
        }

        .owl-controls .owl-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .owl-controls .owl-buttons .owl-prev {
            background: #fff;
            position: absolute;
            top: -13%;
            left: 15px;
            padding: 0 18px 0 15px;
            border-radius: 50px;
            box-shadow: 3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        .owl-controls .owl-buttons .owl-next {
            background: #fff;
            position: absolute;
            top: -13%;
            right: 15px;
            padding: 0 15px 0 18px;
            border-radius: 50px;
            box-shadow: -3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        .owl-controls .owl-buttons .owl-prev:after,
        .owl-controls .owl-buttons .owl-next:after {
            content: "\f104";
            font-family: FontAwesome;
            color: #333;
            font-size: 30px;
        }

        .owl-controls .owl-buttons .owl-next:after {
            content: "\f105";
        }

        @media only screen and (max-width: 1280px) {
            .post-slide .post-content {
                padding: 0px 15px 25px 15px;
            }
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="#" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/images/logos/news-logo-dashboard.svg') }}"  width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <span>
                                    <i class="ti ti-login"></i>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                @if (session('success'))
                    <!-- Success Alert -->
                    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                        <i class="bi-check-circle-fill"></i>
                        <strong class="mx-2">Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Sales Overview</h5>
                                    </div>
                                    <div>
                                        <select class="form-select">
                                            <option value="1">March 2023</option>
                                            <option value="2">April 2023</option>
                                            <option value="3">May 2023</option>
                                            <option value="4">June 2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="fw-semibold mb-3">$36,358</h4>
                                                <div class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-up-left text-success"></i>
                                                    </span>
                                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                    <p class="fs-3 mb-0">last year</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-4">
                                                        <span
                                                            class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-center">
                                                    <div id="breakup"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!-- Monthly Earnings -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row alig n-items-start">
                                            <div class="col-8">
                                                <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                                                <h4 class="fw-semibold mb-3">$6,820</h4>
                                                <div class="d-flex align-items-center pb-1">
                                                    <span
                                                        class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-down-right text-danger"></i>
                                                    </span>
                                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                    <p class="fs-3 mb-0">last year</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-end">
                                                    <div
                                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-currency-dollar fs-6"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="earning"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">

                                    {{-- alert --}}
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title fw-semibold mb-0">Users</h5>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle">
                                            <thead class="text-dark fs-4">

                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Id</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Email</h6>
                                                    </th>

                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Priority</h6>
                                                    </th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                @foreach ($members as $member)
                                                    <tr>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">{{ $member->id }}</h6>
                                                        </td>

                                                        <td class="border-bottom-0">
                                                            <p class="mb-0 fw-normal">{{ $member->email }}</p>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <form
                                                                    action="{{ route('member.delete', $member->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger rounded-3 fw-semibold">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">

                                    <form method="POST" action="{{ route('changeRole') }}">
                                        @csrf
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title fw-semibold mb-0">Role</h5>
                                            <div class="gap-2">
                                                <button type="submit"
                                                    class="btn btn-success rounded-3 fw-semibold">Valider</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-nowrap mb-0 align-middle">
                                                <thead class="text-dark fs-4">
                                                    <tr>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Id</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Name</h6>
                                                        </th>

                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Admin</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($users)
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <td class="border-bottom-0">
                                                                    <h6 class="fw-semibold mb-0">{{ $user->id }}</h6>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <p class="mb-0 fw-normal">{{ $user->name }}</p>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <input type="checkbox"
                                                                            name="roles[{{ $user->id }}]"
                                                                            @if ($user->Role == 'Admin') checked @endif>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="photocont row">
                    <div class="row">
                        <h1 class="d-flex justify-content-between align-items-center">
                            News
                            <!-- Bouton modifié pour déclencher le modal -->
                            <button type="button" class="btn btn-primary btn-lg" style="background: #ed8b03" data-toggle="modal"
                                data-target="#flipFlop">Add News</button>
                        </h1>

                        <!------------ The modal ----------------->
                        <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog"
                            aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/upload" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <main class="responsive-wrapper">
                                                    <div class="page-title">
                                                        <h1>Latest Updates</h1>
                                                    </div>

                                                    <div class="magazine-column">
                                                        <article class="article">
                                                            <div class="upload-container">
                                                                <div class="border-container">
                                                                    <div class="icons fa-4x">
                                                                        <i class="fas fa-file-image"
                                                                            data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                                                        <i class="fas fa-file-alt"
                                                                            data-fa-transform="shrink-2 up-4"></i>
                                                                        <i class="fas fa-file-pdf"
                                                                            data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                                                                        <!-- Ajout d'une icône pour le téléchargement -->
                                                                        <i class="fas fa-upload" id="file-icon"></i>
                                                                    </div>
                                                                    <input type="file" id="file-upload"
                                                                        name="file">
                                                                    <p>Drag and drop files here, or
                                                                        <a href="#" id="file-browser">browse</a>
                                                                        your computer.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">title</label>
                                                                <input type="text" class="form-control"
                                                                    id="title" name="title"
                                                                    placeholder="title">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="comment">Text</label>
                                                                <textarea class="form-control" rows="5" id="text" name="text"></textarea>
                                                            </div>

                                                            <div class="article-author">
                                                                <img src="https://assets.codepen.io/285131/author-2.png"
                                                                    alt="Author" class="article-author-img">
                                                                <div class="article-author-info">
                                                                    <dl>
                                                                        <dt>khawla</dt>
                                                                        <dd>Editor</dd>
                                                                    </dl>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </main>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-secondary">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="news-slider" class="owl-carousel">
                                    {{-- cadre1 --}}
                                    @foreach ($newsItems as $item)
                                        <div class=" ">
                                            <div class="{{ 'item-' . $item->id }} post-slide"
                                                style="            width: 400px;
                                                height: 400px;
                                                background: #fff;
                                                margin: 20px 15px 20px;
                                                border-radius: 15px;
                                                padding-top: 1px;
                                                box-shadow: 0px 14px 22px -9px #bbd8f0;">
                                                <div class="post-img"
                                                    style="            position: relative;
                                                overflow: hidden;
                                                border-radius: 10px;
                                                margin: -12px 15px 8px 15px;
                                                margin-left: -10px;">
                                                    <img src="{{ Storage::url($item->file_path) }}" alt=""
                                                        style=" width: 400px;
                                                    height: 200px;
                                                    transform: scale(1, 1);
                                                    transition: transform 0.2s linear; ">
                                                    <a href="#" class="over-layer"><i
                                                            class="fa fa-link"></i></a>
                                                </div>
                                                <div class="post-content" style="background: #ed8b03;
                                                padding: 2px 20px 40px;
                                                border-radius: 15px;
                                                height: 200px;">
                                                    <h3 class="post-title">
                                                        <a href="#" style="            font-size: 15px;
                                                        font-weight: bold;
                                                        color: #000000;
                                                        display: inline-block;
                                                        text-transform: uppercase;
                                                        transition: all 0.3s ease 0s;">{{ $item->title }}</a>
                                                    </h3>
                                                    <p class="post-description" style=" line-height: 24px;
                                                    color: #000000;
                                                    margin-bottom: 25px;">{{ $item->text }}</p>
                                                    <div>
                                                        <span class="post-date" style="color: #000000;
                                                        font-size: 14px;">
                                                            <i style="font-size: 20px;
                                                            margin-right: 8px;
                                                            color: #cfdace;"
                                                                class="fa fa-clock-o"></i>{{ $item->created_at->format('M d, Y') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrapper mt-2">
                                                {{-- <form action="{{ route('sendMail') }}" method="POST">
                                                @csrf --}}
                                                <div class="d-flex align-items-center">
                                                    <select name="memberId"
                                                        class="form-control mr-2 option-{{ $item->id }}"
                                                        style="background-color: white;">
                                                        @foreach ($members as $member)
                                                            <option value="{{ $member->id }}">{{ $member->email }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button onclick="senddivviaemail({{ $item->id }})"
                                                        type="button" class="btn btn-primary">Send</button>
                                                </div>
                                                {{-- </form> --}}

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {{-- -------- script de envoyer email avec div  ------- --}}
    <script>
        function senddivviaemail(element) {
            let selectElement = document.querySelector(".option-" + element);

            // Get the selected option element
            let selectedOption = selectElement.options[selectElement.selectedIndex];

            // Get the text content of the selected option
            let selectedOptionText = selectedOption.textContent;

            console.log(selectedOptionText);
            console.log(document.querySelector(".item-" + element).innerHTML);

            fetch('/send-div-content', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content') // CSRF token for Laravel
                    },
                    body: JSON.stringify({
                        htmlContent: document.querySelector(".item-" + element).innerHTML,
                        email: selectedOptionText
                    })
                })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch((error) => {
                    console.error('Error:', error);
                });

        }
    </script>
    {{-- ----------------------------------------- --}}
    {{-- script de select --}}
    <script>
        (function($) {

            $.fn.select3 = function(options) {
                var dataItems = [];
                var selectorID = '#' + this.attr('id');

                $(selectorID).find('option').each(function(index, element) {

                    if (element.text != '') {
                        dataItems.push(element.text.trim());
                    } else {
                        dataItems.push(element.value.trim());
                    }

                });

                var opts = $.extend({}, $.fn.select3.defaults, options);

                var idDiv = this.attr('id') + 'searchSelect3';
                var idInput = this.attr('id') + 'searchSelect3_Input';
                var idClose = this.attr('id') + 'searchSelect3_Times';
                var idDown = this.attr('id') + 'searchSelect3_Caret_Down';
                var idList = this.attr('id') + 'searchSelect3_List';
                var idListLi = this.attr('id') + 'searchSelect3_List_LI';

                var selectorDiv = '#' + this.attr('id') + 'searchSelect3';
                var selectorInput = '#' + this.attr('id') + 'searchSelect3_Input';
                var selectorClose = '#' + this.attr('id') + 'searchSelect3_Times';
                var selectorDown = '#' + this.attr('id') + 'searchSelect3_Caret_Down';
                var selectorList = '#' + this.attr('id') + 'searchSelect3_List';
                var selectorListLi = '#' + this.attr('id') + 'searchSelect3_List_LI';

                var buildELement = $('<div class="searchSelect3" id="' + idDiv +
                    '" style="position:relative;"><input class="searchSelect3_Input" placeholder="' + opts
                    .placeholder + '" value="' + opts.defaultvalue + '" id="' + idInput +
                    '"><span class="fa fa-times searchSelect3_Times" id="' + idClose +
                    '"></span><span class="fa fa-caret-down searchSelect3_Caret_Down" id="' + idDown +
                    '"></span></div>');

                if ($(selectorDiv).length > 0) {
                    $(selectorDiv).remove();
                }

                this.after(buildELement);

                if (opts.width > 0) {
                    $(selectorInput).css('width', opts.width);
                    $(selectorDown).css('left', (opts.width - 20));
                    $(selectorClose).css('left', (opts.width - 40));
                }


                var cache = {};
                var drew = false;
                this.hide();



                $(document).on('click', function(e) {
                    //untuk menghilangkan list saat unfocus
                    if ($(e.target).parent().is("li[id*='" + idListLi + "']") == false) {
                        if ($(e.target).attr('id') != idInput && $(e.target).attr('id') != idDown) {
                            $(selectorList).empty();
                            $(selectorList).css('z-index', -1);
                            $(selectorClose).hide();
                        }
                    }



                });




                var showList = function(query, valuee) {



                    //Check if we've searched for this term before
                    if (query in cache) {
                        results = cache[query];
                    } else {
                        //Case insensitive search for our people array
                        var results = $.grep(dataItems, function(item) {
                            return item.search(RegExp(query, "i")) != -1;
                        });

                        //Add results to cache
                        cache[query] = results;
                    }

                    //First search
                    $(selectorList).css('z-index', opts.zIndex);


                    if (drew == false) {
                        //Create list for results
                        $(selectorInput).after('<ul id="' + idList +
                            '" class="searchSelect3_List" style="z-index:' + opts.zIndex + '"></ul>');

                        if (opts.width > 0) {

                            $(selectorList).css('width', opts.width);

                        }

                        if (opts.widthList > 0) {
                            $(selectorList).css('width', opts.widthList);
                        }

                        //Prevent redrawing/binding of list
                        drew = true;

                        //Bind click event to list elements in results
                        $(selectorList).on("click", "li", function() {
                            var nilai = $(this).text()
                            $(selectorInput).val(nilai);
                            $(selectorID).val(nilai);
                            $(selectorList).empty();
                            $(selectorClose).show();
                            $(selectorList).css('z-index', -1);
                            $(selectorID).change();
                        });


                    }
                    //Clear old results
                    else {
                        $(selectorList).empty();
                    }

                    var counter = 0;
                    //Add results to the list
                    for (term in results) {
                        counter++;
                        $(selectorList).append("<li id=" + idListLi + counter + "><label>" + results[term] +
                            "</label></li>");
                    }




                };



                $(selectorInput).on('click', function(e) {
                    var query = $(this).val();

                    showList('', query);


                    $(selectorClose).hide();
                    if (query.length > 0) {
                        $(selectorClose).show();
                    }

                });

                $(selectorInput).on('keyup', function(e) {
                    $(selectorList).empty();
                    var query = $(selectorInput).val();
                    showList(query, query);

                    $(selectorClose).hide();
                    if (query.length > 0) {
                        $(selectorClose).show();
                    }

                    $(selectorID).change();
                });

                //bila key tab di tekan maka akan pindah ke DOM lain, maka dari itu mesti di HIDE LIST nya
                $(selectorInput).on('keydown', function(e) {
                    if (e.which == 9) {
                        $(selectorList).empty();
                        $(selectorList).css('z-index', -1);
                        $(selectorClose).hide();
                    }
                });

                $(selectorDown).on('click', function(e) {
                    var query = $(this).val();
                    if ($(selectorList).find('li').length == 0) {
                        showList('', query);
                    } else {
                        //$(selectorList).css('z-index', -1);
                        $(selectorList).empty();
                        $(selectorList).css('z-index', -1);
                    }

                    $(selectorClose).hide();
                    if (query.length > 0) {
                        $(selectorClose).show();
                    }

                });

                $(selectorClose).on('click', function(e) {
                    $(selectorInput).val('');
                    $(selectorClose).hide();
                    $(selectorID).change();

                });


                return this;
            };

            $.fn.select3.defaults = {
                placeholder: "",
                zIndex: 1,
                defaultvalue: "",
                width: 0,
                widthList: 0
            };

        }(jQuery));
        /* END select3.js */


        $(document).ready(function(e) {

            $('#selectBankList').select3({
                width: 260,
                placeholder: 'Pilih Metode Pelunasan',
                zIndex: 100
            });

            $('#selectDescription').select3({
                width: 400,
                placeholder: 'Pilih Description',
                zIndex: 100,
                widthList: 800
            });


        });
    </script>
    {{-- ------------------------------------------ --}}
    <script>
        $(document).ready(function() {
            $("#news-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigation: true,
                navigationText: ["", ""],
                pagination: true,
                autoPlay: true
            });
        });
    </script>



    <script>
        $("#file-upload").css("opacity", "0");

        $("#file-browser").click(function(e) {
            e.preventDefault();
            $("#file-upload").trigger("click");
        });
    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>

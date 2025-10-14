<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Read">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="description" content="Soma Connect - The only place you can be enjoy learning ">
    <!-- ======== Page title ============ -->
    <title>Soma Connect</title>
    <!--<< Favcion >>-->
    {{-- <link rel="shortcut icon" href="assets/img/favicon.png"> --}}
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="/assets/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="/assets/css/main.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <style>
        .profile-update-section {
            padding: 40px 0;
        }

        .form-title {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        .profile-form {
            max-width: 100%;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: span 2;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        textarea {
            padding: 12px 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        .btn-save {
            background-color: #007BFF;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .typing-indicator {
            display: flex;
            align-items: center;
        }

        .typing-indicator .dot {
            height: 6px;
            width: 6px;
            background-color: #999;
            border-radius: 50%;
            margin: 0 2px;
            animation: blink 1.2s infinite ease-in-out;
        }

        .typing-indicator .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes blink {

            0%,
            80%,
            100% {
                transform: scale(0);
                opacity: 0.3;
            }

            40% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>


</head>

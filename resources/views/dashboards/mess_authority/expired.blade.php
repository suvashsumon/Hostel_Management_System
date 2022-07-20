<!DOCTYPE html>
<html>

<head>
    <title>EasyMemo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="qAJ4br9zaFWQUCOog5Vj1ARNAgzkl3zr1ZlzEUVK">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@300;400;500;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="https://easymemo.net/favicon.ico">

    <!-- plugin css -->
    <link media="all" type="text/css" rel="stylesheet" href="/assets/fonts/feather-font/css/iconfont.css">
    <link media="all" type="text/css" rel="stylesheet" href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
    <!-- end plugin css -->


    <!-- common css -->
    <link media="all" type="text/css" rel="stylesheet" href="/css/app.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/custom/style.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/custom/query.css">
    <!-- end common css -->

</head>

<body>



    <div class="main-wrapper master2_main" id="app">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 auth-page mx-0 ">
                    <div class="col-md-8 col-xl-6 col-sm-12 mx-auto">
                        <div class=" row approval_card">
                            <div class="col-lg-8 col-sm-12 d-flex flex-column p-5">

                                <h4 class="text-gray"><span style="color: rgb(250, 97, 8)"><b>দুঃখিত, 
                                        </b></span>{{ Auth::user()->name }}!</h4>
                                <p class="text-success mb-3">আপনার একাউন্টটির মেয়াদ শেষ হয়েছে।</p>

                                <p class="text-gray">আপনি যদি <span class="text-success">মেস মালিক</span> হন তবে আপনার
                                    পেমেন্ট <b>(৫০০০ টাকা)</b> কনফার্ম করে নিচের নাম্বারে কল করুন!</p>
                                <p class="text-gray mb-3">নাম্বারঃ <b> 01321 300 804</b></p>


                                <p class="text-gray mb-3">আপনার একাউন্ট টি পুনরায় একটিভ করে দেওয়া হবে।</p>
                                <p class="text-gray mb-3"><span class="text-success">ম্যানেজার বা অন্যকেউ</span> হলে
                                    আপনার মেসের মালিকের সাথে যোগাযোগ করুন।</p>

                                <p class="text-gray"><b>মেস মালিকের ফি - ৫০০০ টাকা (বাৎসরিক)</b></p>
                                <p class="text-gray mb-3"><b>আমাদের বিকাশ নাম্বারঃ 01627 660 413</b>
                                </p>

                                <p class="text-gray">{{ config('app.name', 'Tinkers Ltd.') }} ব্যাবহার করার জন্য আপনাকে
                                    ধন্যবাদ।</p>
                                <p class="text-gray mb-3"><b>আল্লাহ আপানর ব্যাবসায় বরকত দান করুক।</b></p>

                                <h4 class="text-gray">জাযাকাল্লাহু খাইরান!</h4>

                                <a href="https://easymemo.net/guest_helpline">{{ config('app.name', 'Tinkers Ltd.') }}
                                    হেল্প লাইন</a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button name="submit">Log Out</button>
                                </form>



                            </div>
                            <div class="col-lg-4 col-sm-12 d-flex align-items-center justify-content-center">
                                <img src="https://easymemo.net/storage/settings/bkash_1650671804.jpg" alt=" QR code  ">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="footer">
        <p class="text-gray text-center">Copyright by {{ config('app.name', 'Tinkers Ltd.') }} 2022. যেকোন প্রয়োজনে
            যোগাযোগঃ
            <b>01321 300 804</b>
        </p>
    </div>


    <!-- base js -->
    <script src="/js/app.js"></script>
    <script src="/assets/plugins/feather-icons/feather.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <!-- end plugin js -->

    <!-- common js -->
    <script src="/assets/js/template.js"></script>
    <!-- end common js -->


</body>

</html>
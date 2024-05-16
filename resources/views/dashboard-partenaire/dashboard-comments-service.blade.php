<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
    </head>
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47cb46ef94.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


    <style>
        .profile_image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #333;
        }

        /* .container{
                display: flex;
                gap: 30px;
                margin: 30px;
            } */
        .comments_cards {
            transition: all 0.3s ease-in-out;
            /* Transition for all properties over 0.3 seconds */

        }
    </style>

    <body>
        <!-- =============== Navigation ================ -->

        <div class="containers">
            @include('components.sidebar_dash')
            <div class="main">
                @include('components.navbar_dash')





                <div class="container mt-5">

                    @foreach ($comments as $comment)
                        <div class="flex flex-col h-[195px] border border-gray-500 p-4 rounded mb-5">
                            <div class="flex gap-4 ">
                                <img src="/storage/clients/{{ $comment->image }}" alt="profile photo" width="50"
                                    height="50" class="profile_image">
                                <div class="col-span-4 flex flex-col items-start">
                                    <h2 class="font-medium"> {{ $comment->prenom }} {{ $comment->nom }}</h2>
                                    <div class="flex gap-3 text-[13px]">
                                        <div class="flex items-center gap-1 text-[#FFBF00]">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $comment->rating)
                                                    <i class="fa-solid fa-star"></i> <!-- Solid star -->
                                                @else
                                                    <i class="fa-regular fa-star"></i> <!-- Regular star -->
                                                @endif
                                            @endfor
                                        </div>

                                        <h2 class="font-medium text-gray-500">{{ $comment->date_commentaire }}</h2>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 line-clamp-4">
                                {{ $comment->commentaire }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>


            <div class="comments">






            </div>

            <!-- =========== Scripts =========  -->
            <script src="/js/js-dash/main.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>

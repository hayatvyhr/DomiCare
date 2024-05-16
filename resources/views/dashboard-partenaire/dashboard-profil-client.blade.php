<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard/style_demande.css') }}">
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
    <!-- @vite('resources/js/app.js') -->

    <style>
        .container {
            width: 100%;
            margin-right: auto;
            margin-left: 0;
            padding-right: 0rem;
            padding-left: 0rem;
        }

        .main {
            /* width: calc(100% - 0px); */
        }

        body {
            margin: 0;
        }

        .profile-page .content {
            margin-top: 80px;
            margin-left: 150px;
        }
    </style>

    <body>
        <div class="container">
            @include('components.sidebar_dash')
            <div class="main">
                @include('components.navbar_dash')

                <div class="profile-page">
                    <div class="content">
                        <div class="content__cover">
                            <img class="content__avatar" src="/storage/clients/{{ $client->image }}" alt="Image">

                            <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                        <div class="content__actions"><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M192 256A112 112 0 1 0 80 144a111.94 111.94 0 0 0 112 112zm76.8 32h-8.3a157.53 157.53 0 0 1-68.5 16c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 0 0 0 403.2V432a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48v-28.8A115.23 115.23 0 0 0 268.8 288z">
                                    </path>
                                    <path fill="currentColor"
                                        d="M480 256a96 96 0 1 0-96-96 96 96 0 0 0 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592a48 48 0 0 0 48-48 111.94 111.94 0 0 0-112-112z">
                                    </path>
                                </svg><span>ID = {{ $client->id_user }}</span></a><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M208 352c-41 0-79.1-9.3-111.3-25-21.8 12.7-52.1 25-88.7 25a7.83 7.83 0 0 1-7.3-4.8 8 8 0 0 1 1.5-8.7c.3-.3 22.4-24.3 35.8-54.5-23.9-26.1-38-57.7-38-92C0 103.6 93.1 32 208 32s208 71.6 208 160-93.1 160-208 160z">
                                    </path>
                                    <path fill="currentColor"
                                        d="M576 320c0 34.3-14.1 66-38 92 13.4 30.3 35.5 54.2 35.8 54.5a8 8 0 0 1 1.5 8.7 7.88 7.88 0 0 1-7.3 4.8c-36.6 0-66.9-12.3-88.7-25-32.2 15.8-70.3 25-111.3 25-86.2 0-160.2-40.4-191.7-97.9A299.82 299.82 0 0 0 208 384c132.3 0 240-86.1 240-192a148.61 148.61 0 0 0-1.3-20.1C522.5 195.8 576 253.1 576 320z">
                                    </path>
                                </svg><span>Message</span></a></div>
                        <div class="content__title">
                            <h1>{{ $client->nom }} {{ $client->prenom }} </h1>
                        </div>


                        <div class="content__description">
                            <div>
                                <p class="title"><strong>NOM:</strong></p>
                                <p class="content_p">{{ $client->nom }}</p>
                            </div>
                            <div>
                                <p class="title"><strong>PRENOM:</strong></p>
                                <p class="content_p">{{ $client->prenom }}</p>
                            </div>
                            <div>
                                <p class="title"><strong>VILLE:</strong></p>
                                <p class="content_p">{{ $client->ville }}</p>
                            </div>
                            <div>
                                <p class="title"><strong>AGE:</strong></p>
                                <p class="content_p">{{ $client->age }}</p>
                            </div>
                            <div>
                                <p class="title"><strong>EMAIL:</strong></p>
                                <p class="content_p">{{ $client->email }}</p>
                            </div>
                            <div>
                                <p class="title"><strong>TELEPHONE:</strong></p>
                                <p class="content_p">{{ $client->telephone }}</p>
                            </div>
                        </div>


                        <!-- <ul class="content__list">
      <li><span>65</span>Friends</li>
      <li><span>43</span>Photos</li>
      <li><span>21</span>Comments</li>
    </ul> -->
                        <div class="content__button">
                            <button class="button" onclick="toggleComments()">Toggle Comments</button>



                            <div class="comments-container hidden">
                                <div class="container grid grid-cols-2 gap-4 mt-5">

                                    @foreach ($comments as $comment)
                                        <div
                                            class=" cards_comment flex flex-col h-[195px] border border-gray-500 p-4 rounded">
                                            <div class="flex gap-4 ">
                                                <img src="/storage/partenaires/{{ $comment->image }}"
                                                    alt="profile photo" width="50" height="50"
                                                    class="profile_image">
                                                <div class="col-span-4 flex flex-col items-start">
                                                    <h2 class="font-medium"> {{ $comment->prenom }}
                                                        {{ $comment->nom }}</h2>
                                                    <div class="flex gap-3 text-[13px]">
                                                        <div class="flex items-center gap-1 text-[#FFBF00]">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $comment->rating)
                                                                    <i class="fa-solid fa-star"></i> <!-- Solid star -->
                                                                @else
                                                                    <i class="fa-regular fa-star"></i>
                                                                    <!-- Regular star -->
                                                                @endif
                                                            @endfor
                                                        </div>

                                                        <h2 class="font-medium text-gray-500">
                                                            {{ $comment->date_commentaire }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 line-clamp-4  text-left ">
                                                {{ $comment->commentaire }}
                                            </p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>


                        <script>
                            function toggleComments() {
                                var commentsContainer = document.querySelector('.comments-container');
                                commentsContainer.classList.toggle('hidden');
                            }
                        </script>

                        <style>
                            /* .container {
                                display: grid;
                                gap: 10px;
                            } */

                            .cards_comment {
                                margin-top: 10px;
                                transition: transform 0.3s ease, box-shadow 0.3s ease;

                            }

                            .cards_comment:hover {
                                transform: translateY(-7px);
                                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                            }
                        </style>










                    </div>














                    <div class="bg">
                        <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>




                    <div class="theme-switcher-button" id="theme-switcher-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="currentColor"
                                d="M352 0H32C14.33 0 0 14.33 0 32v224h384V32c0-17.67-14.33-32-32-32zM0 320c0 35.35 28.66 64 64 64h64v64c0 35.35 28.66 64 64 64s64-28.65 64-64v-64h64c35.34 0 64-28.65 64-64v-32H0v32zm192 104c13.25 0 24 10.74 24 24 0 13.25-10.75 24-24 24s-24-10.75-24-24c0-13.26 10.75-24 24-24z">
                            </path>
                        </svg>
                    </div>
                </div>



            </div>
        </div>

        <script src="/js/js-dash/main.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>

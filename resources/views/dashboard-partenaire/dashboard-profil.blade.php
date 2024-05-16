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

    <style>
        .profile-page {
            padding-top: 5rem;
        }

        .main {
            padding-left: 3rem;
            padding-bottom: 2rem;
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
                            <img class="content__avatar" src="{{ asset('/storage/partenaires/' . $data->image) }}"
                                alt="Image">

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
                                </svg><span>ID = {{ $data->id_user }}</span></a><a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M208 352c-41 0-79.1-9.3-111.3-25-21.8 12.7-52.1 25-88.7 25a7.83 7.83 0 0 1-7.3-4.8 8 8 0 0 1 1.5-8.7c.3-.3 22.4-24.3 35.8-54.5-23.9-26.1-38-57.7-38-92C0 103.6 93.1 32 208 32s208 71.6 208 160-93.1 160-208 160z">
                                    </path>
                                    <path fill="currentColor"
                                        d="M576 320c0 34.3-14.1 66-38 92 13.4 30.3 35.5 54.2 35.8 54.5a8 8 0 0 1 1.5 8.7 7.88 7.88 0 0 1-7.3 4.8c-36.6 0-66.9-12.3-88.7-25-32.2 15.8-70.3 25-111.3 25-86.2 0-160.2-40.4-191.7-97.9A299.82 299.82 0 0 0 208 384c132.3 0 240-86.1 240-192a148.61 148.61 0 0 0-1.3-20.1C522.5 195.8 576 253.1 576 320z">
                                    </path>
                                </svg><span>Message</span></a></div>
                        <div class="content__title">
                            <h1>{{ $data->nom }} {{ $data->prenom }} </h1>
                        </div>


                        <div class="content__description">
                            <form action="{{ route('update_client.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_partenaire" value="{{ $data->id_user }}">
                                <div>
                                    <label for="image" class="title"><strong>IMAGE:</strong></label>
                                    <input type="file" id="image" name="image">
                                </div>
                                <div>
                                    <label for="nom" class="title"><strong>NOM:</strong></label>
                                    <input type="text" id="nom" name="nom" class="content_p"
                                        value="{{ $data->nom }}">
                                </div>
                                <div>
                                    <label for="prenom" class="title"><strong>PRENOM:</strong></label>
                                    <input type="text" id="prenom" name="prenom" class="content_p"
                                        value="{{ $data->prenom }}">
                                </div>
                                <div>
                                    <label for="ville" class="title"><strong>VILLE:</strong></label>
                                    <input type="text" id="ville" name="ville" class="content_p"
                                        value="{{ $data->ville }}">
                                </div>
                                <div>
                                    <label for="age" class="title"><strong>AGE:</strong></label>
                                    <input type="number" id="age" name="age" class="content_p"
                                        value="{{ $data->age }}">
                                </div>
                                <div>
                                    <label for="email" class="title"><strong>EMAIL:</strong></label>
                                    <input type="email" id="email" name="email" class="content_p"
                                        value="{{ $data->email }}">
                                </div>
                                <div>
                                    <label for="telephone" class="title"><strong>TELEPHONE:</strong></label>
                                    <input type="tel" id="telephone" name="telephone" class="content_p"
                                        value="{{ $data->telephone }}">
                                </div>
                                <div>

                                    <button type="submit" class="submit-btn">Submit</button>
                                    <!-- This is your submit button -->
                                </div>
                            </form>
                        </div>
                        <style>
                            .submit-btn {
                                background-color: #007bff;
                                /* Blue background color */
                                color: #fff;
                                /* White text color */
                                padding: 10px 20px;
                                /* Padding around text */
                                border: none;
                                /* No border */
                                border-radius: 5px;
                                /* Rounded corners */
                                cursor: pointer;
                                /* Show pointer cursor on hover */
                                transition: background-color 0.3s;
                                /* Smooth transition for background color change */
                                margin-left: 250px;
                            }

                            .submit-btn:hover {
                                background-color: #0056b3;
                                /* Darker blue color on hover */
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

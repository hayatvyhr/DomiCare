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
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
            rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/47cb46ef94.js" crossorigin="anonymous"></script>
        <!-- @vite('resources/css/app.css') -->
        @vite('resources/js/app.js')

        <style>
            .no_comment {
                padding: 80px;
            }

            .title_sec {
                padding-top: 60px;
                padding-left: 20px;
                padding-bottom: 20px;
            }

            a {
                color: #f96332;
            }

            .m-t-5 {
                margin-top: 5px;
            }

            .card {
                background: #fff;
                margin-bottom: 30px;
                transition: .5s;
                border: 0;
                border-radius: .1875rem;
                display: inline-block;
                position: relative;
                width: 100%;
                box-shadow: none;
            }

            .card .body {
                font-size: 14px;
                color: #424242;
                padding: 20px;
                font-weight: 400;
                /* background-color: #007bff; */
                border-radius: 30px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                /* Add box shadow */
                transition: background-color 0.3s ease;
                box-shadow: 0 4px 8px rgba(127, 87, 241, 0.1), inset 0 0 10px rgba(127, 87, 241, 0.2);
                /* Add inner shadow */


            }

            .profile-page .profile-header {
                position: relative
            }

            /* .profile-page .profile-header .profile-image img {
    border-radius: 50%;
    width: 100px;
    border: 3px solid #fff;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)
} */
            /*
.img{
    width: 100px;
} */
            .profile-page .profile-header .social-icon a {
                margin: 0 5px
            }

            .profile-page .profile-sub-header {
                min-height: 60px;
                width: 100%
            }

            .profile-page .profile-sub-header ul.box-list {
                display: inline-table;
                table-layout: fixed;
                width: 100%;
                background: #eee
            }

            .profile-page .profile-sub-header ul.box-list li {
                border-right: 1px solid #e0e0e0;
                display: table-cell;
                list-style: none
            }

            .profile-page .profile-sub-header ul.box-list li:last-child {
                border-right: none
            }

            .profile-page .profile-sub-header ul.box-list li a {
                display: block;
                padding: 15px 0;
                color: #424242
            }

            .nom {
                padding: 20px;
            }

            img {
                width: 150px;
                height: 150px;
                overflow: hidden;
            }

            .title_sec {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            #dynamicPart {
                color: #7f57f1;
            }
        </style>
    </head>

    <body>
        <!-- =============== Navigation ================ -->

        <script>
            // Example code to change the dynamic part of the title text every 5 seconds
            const dynamicParts = ['Clients', 'Customers', 'Users'];
            let currentIndex = 0;

            function changeDynamicPart() {
                document.getElementById('dynamicPart').textContent = dynamicParts[currentIndex];
                currentIndex = (currentIndex + 1) % dynamicParts.length;
            }

            setInterval(changeDynamicPart, 5000); // Change dynamic part every 5 seconds
        </script>
        <div class="containers">
            @include('components.sidebar_dash')
            <div class="main">
                @include('components.navbar_dash')




                <!-- <h2  class="title_sec">Comments Your Clients Now !!</h2> -->
                <h2 class="title_sec">Comments Your <span id="dynamicPart">Clients</span> Now !!</h2>

                <div class="container mt-5">
                    <div class="list">
                        @if (count($demandesTerminees) > 0)

                            @foreach ($demandesTerminees as $demande)
                                @php
                                    $timestampFin = strtotime($demande->completed_at);
                                    $timestampMaintenant = time();
                                    $difference = $timestampMaintenant - $timestampFin;
                                    $jours = 7 - floor($difference / (60 * 60 * 24));
                                    // $heures = floor(($difference - $jours * 60 * 60 * 24) / (60 * 60));
                                    $tempsRestant = "$jours jours";
                                @endphp

                                <style>
                                    .card {
                                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                                    }

                                    .card:hover {
                                        transform: translateY(-7px);
                                        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                                    }
                                </style>
                                @if ($jours > 0)
                                    <div class="cards_items">
                                        <div class="card profile-header">
                                            <div class="body">
                                                <h2 class="nom"><strong>{{ $demande->client->nom }}
                                                        {{ $demande->client->prenom }}</strong> </h4>

                                                    <div class="element">
                                                        <div class="col-lg-4 col-md-4 col-12">

                                                            <div class="profile-image float-md-right"> <img
                                                                    style="width: 150px"
                                                                    src="/storage/clients/{{ $demande->client->image }}"
                                                                    alt=""> </div>
                                                            <div class="">
                                                                <!-- <p> <strong>Demande ID:</strong>{{ $demande->id_demande }}</p> -->
                                                                <span class="job_post"> <strong> Temps Restant :<br>
                                                                    </strong>{{ $tempsRestant }}</span>
                                                            </div>
                                                        </div>
                                                        <form action="{{ route('comment.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="demande_id"
                                                                value="{{ $demande->id_demande }}">
                                                            <input type="hidden" name="id_client"
                                                                value="{{ $demande->id_client }}">
                                                            <input type="hidden" name="id_partenaire"
                                                                value="{{ $demande->id_partenaire }}">
                                                            <input type="hidden" name="id_service"
                                                                value="{{ $demande->id_service }}">


                                                            <div class="form-group">
                                                                <label for="rating"><strong> Note: </strong></label>
                                                                <div class="rating">
                                                                    <input type="radio" name="rating"
                                                                        id="star5_{{ $demande->id_demande }}"
                                                                        value="5"><label
                                                                        for="star5_{{ $demande->id_demande }}"><i
                                                                            class="fas fa-star"></i></label>
                                                                    <input type="radio" name="rating"
                                                                        id="star4_{{ $demande->id_demande }}"
                                                                        value="4"><label
                                                                        for="star4_{{ $demande->id_demande }}"><i
                                                                            class="fas fa-star"></i></label>
                                                                    <input type="radio" name="rating"
                                                                        id="star3_{{ $demande->id_demande }}"
                                                                        value="3"><label
                                                                        for="star3_{{ $demande->id_demande }}"><i
                                                                            class="fas fa-star"></i></label>
                                                                    <input type="radio" name="rating"
                                                                        id="star2_{{ $demande->id_demande }}"
                                                                        value="2"><label
                                                                        for="star2_{{ $demande->id_demande }}"><i
                                                                            class="fas fa-star"></i></label>
                                                                    <input type="radio" name="rating"
                                                                        id="star1_{{ $demande->id_demande }}"
                                                                        value="1"><label
                                                                        for="star1_{{ $demande->id_demande }}"><i
                                                                            class="fas fa-star"></i></label>
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <input type="radio" name="like_dislike"
                                                                    id="like_{{ $demande->id_demande }}"
                                                                    value="like">
                                                                <label for="like_{{ $demande->id_demande }}"><i
                                                                        class="fas fa-thumbs-up"></i> Like</label>

                                                                <input type="radio" name="like_dislike"
                                                                    id="dislike_{{ $demande->id_demande }}"
                                                                    value="dislike">
                                                                <label for="dislike_{{ $demande->id_demande }}"><i
                                                                        class="fas fa-thumbs-down"></i> Dislike</label>
                                                            </div>

                                                            <div class="form-group">
                                                                <label
                                                                    for="commentaire_{{ $demande->id_demande }}"><strong>
                                                                        Commentaire:</strong> </label>
                                                                <input type="text"
                                                                    id="commentaire_{{ $demande->id_demande }}"
                                                                    name="commentaire" class="form-control"
                                                                    placeholder="Ajouter un commentaire">
                                                            </div>
                                                            <link
                                                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
                                                                rel="stylesheet">

                                                            <button type="submit"
                                                                class="btn btn-primary submitBtn envoyer">Envoyer</button>
                                                        </form>

                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <!-- If there are no finished demands, display a message or leave it empty -->
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="no_comment">No finished demands available.</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>


                </div>
            </div>


            <div class="comments">



                <style>
                    h3 {
                        padding: 50px;
                    }

                    .list {
                        display: flex;
                        gap: 20px;
                        flex-wrap: wrap;
                        margin-left: 100px;
                    }

                    img {
                        border-radius: 50%;
                    }

                    .cards_items {
                        padding-left: 30px;
                        width: 600px;
                        transition: all 0.3s ease-out;
                        /* Transition for all properties */
                    }

                    .element {
                        display: flex;
                        gap: 50px;
                    }

                    .cards_commentaire {
                        display: flex;
                        gap: 10px;
                        padding: 30px;
                        flex-wrap: wrap;
                        flex-direction: row;

                    }

                    .card-body {
                        padding: 20px;
                    }

                    .card-title {
                        font-size: 1.25rem;
                        margin-bottom: 10px;
                    }

                    .card p {
                        margin-bottom: 5px;
                    }

                    .form-group {
                        margin-bottom: 15px;
                    }

                    .rating {
                        /* margin-bottom: 15px; */
                    }

                    label {
                        margin-bottom: 0px;
                    }

                    .rating input[type="radio"] {
                        display: none;
                    }

                    .rating label {
                        display: inline-block;
                        font-size: 24px;
                        color: #ccc;
                        cursor: pointer;
                    }

                    .rating label:hover,
                    .rating label:hover~label,
                    .rating input[type="radio"]:checked~label {
                        color: #ffbf00;
                    }

                    .btn-like,
                    .btn-dislike {
                        border: none;
                        background: none;
                        color: #333;
                        cursor: pointer;
                        margin-right: 10px;
                    }

                    .btn-like:focus,
                    .btn-dislike:focus {
                        outline: none;
                    }

                    .btn-like.active .fas.fa-thumbs-up,
                    .btn-dislike.active .fas.fa-thumbs-down {
                        color: #007bff;
                    }

                    .card_commentaire {
                        display: flex;
                        width: 600px;
                        gap: 10px;
                        padding: 30px;
                        border-radius: 30px;
                        border: 1px solid #ced4da;
                        /* Define your border style */

                    }

                    .card-container {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 20px;
                        justify-content: center;
                    }

                    /* .card {
        width: 350px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    } */

                    .card-body {
                        /* padding: 20px; */
                    }

                    .card-title {
                        font-size: 1.25rem;
                        margin-bottom: 10px;
                    }

                    .card p {
                        margin-bottom: 5px;
                    }

                    .form-group {
                        /* margin-bottom: 15px; */
                    }

                    .rating {
                        margin-bottom: 15px;
                    }

                    .submitBtn {
                        background-color: #7f57f1;
                        color: #fff;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s ease;
                        text-align: left;

                    }

                    .submitBtn:hover {
                        background-color: #0056b3;
                    }

                    .form-group input[type="text"] {
                        width: 100%;
                        /* Full width */
                        /* padding: 10px; Padding */
                        border: 1px solid #ccc;
                        /* Border */
                        border-radius: 5px;
                        /* Rounded corners */
                        box-sizing: border-box;
                        /* Include padding and border in width calculation */
                        margin-top: 5px;
                        /* Margin top */
                        width: 280px;
                        height: 80px;
                    }

                    /* Input field focus state */
                    .form-group input[type="text"]:focus {
                        outline: none;
                        /* Remove default focus outline */
                        border-color: #007bff;
                        /* Border color on focus */
                        box-shadow: 0 0 2px rgba(0, 123, 255, 0.3);
                        /* Box shadow on focus */
                    }
                </style>


            </div>

            <!-- =========== Scripts =========  -->
            <script src="/js/js-dash/main.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>

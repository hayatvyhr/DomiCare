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




    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47cb46ef94.js" crossorigin="anonymous"></script>
    {{-- @vite('resources/css/app.css') --}}
    @vite('resources/js/app.js')
    <style>
        .style {
            width: 200px;
            height: 200px;
            overflow: hidden;

        }

        .card_service {
            width: 400px;
            margin: 10px;
        }

        .service_list {
            display: flex;
            flex-wrap: wrap;
            /* gap: 15px; */
        }

        .card_service {
            width: 500px;
            margin: 30px 60px;
            border: 1px solid #4b5563;
            border-radius: 0.375rem;
            transition: all 0.3s ease-in-out;
        }

        .card_service:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transform: scale(1.05);
        }


        .card_service.hidden {
            opacity: 0;
        }

        .profile_image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #333;
            margin: 20px auto 10px;
            display: block;
        }

        .service_title {
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        .service_location {
            font-size: 16px;
            color: #333;
            text-align: center;
        }

        .service_stats {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }

        .stat {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .stat i {
            margin-right: 5px;
        }

        .service_description {
            padding: 0 20px;
            text-align: center;
            line-height: 1.5;
        }

        .service_price {
            font-weight: bold;
            color: #ffbf00;
            font-size: 24px;
            text-align: center;
        }

        .star_rating {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .star_rating i {
            color: #FFBF00;
            font-size: 24px;
        }

        .reserve_button {
            background-color: #7f57f1;
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 40px;
            margin-bottom: 20px;
        }

        .delete_button {
            background-color: red;
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 40px;
            margin-bottom: 20px;
        }

        .update_pop_button {
            background-color: #7f57f1;
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 40px;
        }

        .reserve_button:hover {
            background-color: #ff6c40;
        }

        .titre {
            padding-left: 30px;
            padding-top: 40px;
        }

        a {
            text-decoration: none;
        }

        .add-service-btn {
            padding: 15px;
            font-size: 16px;
            margin-left: 4rem;
            margin-top: 1rem;
            background-color: #7F57F1;
        }

        .add-service-btn:hover {
            background-color: #5e2beb;
        }
    </style>

    <body>
        <div class="container">
            @include('components.sidebar_dash')
            <div class="main">
                @include('components.navbar_dash')*
                <h2 class="titre">Mes Services :</h2>

                <a href="{{ route('dashboard.partenaire.add_service') }}">
                    <button class="add-service-btn">Add Service</button>
                </a>
                <div class="service_list">
                    @foreach ($servicesWithDemandsCount as $service)
                        <div class="card_service">
                            @if ($service->interventions->image)
                                <img src="/interventions/{{ $service->interventions->image }}" alt="profile image"
                                    height="100" width="100" class="profile_image">
                            @endif
                            <h2 class="service_title">Domaine : {{ $service->interventions->category->nom }}</h2>
                            <h2 class="service_title">{{ $service->interventions->nom }}</h2>
                            <h2 class="service_location">{{ $service->ville }}</h2>
                            <h2 class="service_location">
                                @if ($service->is_available == 1)
                                    disponible
                                @else
                                    non disponible
                                @endif
                            </h2>
                            <div class="service_stats">
                                <div class="stat">
                                    <i class="fa-solid fa-clipboard-list"></i>
                                    <a href="{{ route('dashboard-partenaire-demandes', $service->id_service) }}">
                                        <h2>{{ $service->demandes_count }}</h2>
                                    </a>
                                </div>

                                <div class="stat">
                                    <i class="fa-solid fa-comment"></i>
                                    <h2>
                                        <a href="{{ route('showAllComments', $service->id_service) }}">
                                            {{ $service->commentaires()->where('id_user', session('user_id'))->where('emetteur', 'client')->count() }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <p class="service_description">{{ $service->description }}</p>
                            <h2 class="service_price">${{ $service->prix_intervention }}</h2>

                            <div class="star_rating">
                                @php
                                    $sumComments = $service
                                        ->commentaires()
                                        ->where('id_user', session('user_id'))
                                        ->where('emetteur', 'client')
                                        ->sum('rating');

                                    $countComments = $service
                                        ->commentaires()
                                        ->where('id_user', session('user_id'))
                                        ->where('emetteur', 'client')
                                        ->count();
                                    $rating = $countComments > 0 ? $sumComments / $countComments : 0;
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating)
                                        <i class="fas fa-star"></i>
                                    @elseif ($i - $rating < 1)
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                                <span>({{ number_format($rating, 1) }})</span>
                            </div>

                            <div class="btns_d_u">

                                <form method="POST" action="{{ route('service.destroy', $service->id_service) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_button">Supprimer</button>
                                </form>

                                <form method="POST"
                                    action="{{ route('service.availability', $service->id_service) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="reserve_button" style="background-color :#7f57f1">
                                        Availability</button>
                                </form>
                                <button class="btn-open-popup reserve_button "
                                    onclick="togglePopup('{{ $service->id_service }}')">
                                    Update
                                </button>

                            </div>

                        </div>

                        <div id="popupOverlay{{ $service->id_service }}" class="overlay-container">
                            <div class="popup-box">
                                <h2 style="color: green;">Update Service</h2>
                                <form method="POST" class="form-container"
                                    action="{{ route('service.update', $service->id_service) }}">
                                    @csrf
                                    @method('PUT')
                                    <label class="form-label" for="description">Description:</label>
                                    <textarea class="form-input" name="description" id="description" style="height: 200px;">{{ $service->description }}</textarea>
                                    <label class="form-label" for="price">Price:</label>
                                    <input class="form-input" type="number" name="price" id="price"
                                        value="{{ $service->prix_intervention }}">
                                    <label class="form-label" for="location">Location:</label>
                                    <input class="form-input" type="text" name="location" id="location"
                                        value="{{ $service->ville }}">
                                    <button type="submit" class="update_pop_button">Update Service</button>
                                </form>
                                <button class="btn-close-popup"
                                    onclick="togglePopup('{{ $service->id_service }}')">Close</button>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>




        <script>
            function togglePopup(serviceId) {
                const overlay = document.getElementById('popupOverlay' + serviceId);
                overlay.classList.toggle('show');
            }
        </script>

        <style>
            .btns_d_u {
                display: flex;
                gap: 10px;
            }

            .btn-open-popup {
                padding: 12px 24px;
                font-size: 18px;
                background-color: green;
                color: #fff;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s ease;

            }

            .btn-open-popup:hover {
                background-color: #4caf50;
            }

            .overlay-container {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .popup-box {
                background: #fff;
                padding: 24px;
                border-radius: 12px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
                width: 600px;
                text-align: center;
                opacity: 0;
                transform: scale(0.8);
                animation: fadeInUp 0.5s ease-out forwards;
            }

            .form-container {
                display: flex;
                flex-direction: column;
            }

            .form-label {
                margin-bottom: 10px;
                font-size: 16px;
                color: #444;
                text-align: left;
            }

            .form-input {
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
                width: 100%;
                box-sizing: border-box;
            }

            .btn-submit,
            .btn-close-popup {
                padding: 12px 24px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .btn-submit {
                background-color: green;
                color: #fff;
            }

            .btn-close-popup {
                margin-top: 12px;
                background-color: #e74c3c;
                color: #fff;
            }

            .btn-submit:hover,
            .btn-close-popup:hover {
                background-color: #4caf50;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .overlay-container.show {
                display: flex;
                opacity: 1;
            }
        </style>
        <script src="/js/js-dash/main.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>

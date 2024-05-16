<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <!-- ======= Styles ====== -->
        <link rel="stylesheet" href="{{ asset('css/dashboard/style2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard/adminDash.css') }}">
    </head>
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <style>
        :root {
            // Basic
            --c-white: #fff;
            --c-black: #000;

            // Greys
            --c-ash: #eaeef6;
            --c-charcoal: #a0a0a0;
            --c-void: #141b22;

            // Beige/Browns
            --c-fair-pink: #FFEDEC;
            --c-apricot: #FBC8BE;
            --c-coffee: #754D42;
            --c-del-rio: #917072;

            // Greens
            --c-java: #1FCAC5;

            // Purples
            --c-titan-white: #f1eeff;
            --c-cold-purple: #a69fd6;
            --c-indigo: #6558d3;
            --c-governor: #4133B7;
        }

        .information {
            background-color: var(--c-white);
            padding: 1.5rem;

            .tag {
                display: inline-block;
                background-color: var(--c-titan-white);
                color: var(--c-indigo);
                font-weight: 600;
                font-size: 0.875rem;
                padding: 0.5em 0.75em;
                line-height: 1;
                border-radius: 6px;

                &+* {
                    margin-top: 1rem;
                }
            }

            .title {
                font-size: 1.5rem;
                color: var(--c-void);
                line-height: 1.25;

                &+* {
                    margin-top: 1rem;
                }
            }

            .info {
                color: var(--c-charcoal);

                &+* {
                    margin-top: 1.25rem;
                }
            }

            .button {
                font: inherit;
                line-height: 1;
                background-color: var(--c-white);
                border: 2px solid var(--c-indigo);
                color: var(--c-indigo);
                padding: 0.5em 1em;
                border-radius: 6px;
                font-weight: 500;
                display: inline-flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.5rem;

                &:hover,
                &:focus {
                    background-color: var(--c-indigo);
                    color: var(--c-white);
                }
            }

            .details {
                display: flex;
                gap: 1rem;

                div {
                    padding: .75em 1em;
                    background-color: var(--c-titan-white);
                    border-radius: 8px;
                    display: flex;
                    flex-direction: column-reverse;
                    gap: .125em;
                    flex-basis: 50%;
                }

                dt {
                    font-size: .875rem;
                    color: var(--c-cold-purple);
                }

                dd {
                    color: var(--c-indigo);
                    font-weight: 600;
                    font-size: 1.25rem;
                }
            }
        }


        .plan {
            padding: 10px;
            background-color: var(--c-white);
            color: var(--c-del-rio);

            strong {
                font-weight: 600;
                color: var(--c-coffee);
            }

            .inner {
                padding: 20px;
                padding-top: 40px;
                background-color: var(--c-fair-pink);
                border-radius: 12px;
                position: relative;
                overflow: hidden;
            }

            .pricing {
                position: absolute;
                top: 0;
                right: 0;
                background-color: var(--c-apricot);
                border-radius: 99em 0 0 99em;
                display: flex;
                align-items: center;
                padding: .625em .75em;
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--c-coffee);

                small {
                    color: var(--c-del-rio);
                    font-size: .75em;
                    margin-left: .25em;
                }

            }

            .title {
                font-weight: 600;
                font-size: 1.25rem;
                color: var(--c-coffee);

                &+* {
                    margin-top: .75rem;
                }
            }

            .info {
                &+* {
                    margin-top: 1rem;
                }
            }

            .features {
                display: flex;
                flex-direction: column;

                li {
                    display: flex;
                    align-items: center;
                    gap: .5rem;

                    &+* {
                        margin-top: .75rem;
                    }
                }

                .icon {
                    background-color: var(--c-java);
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    color: var(--c-white);
                    border-radius: 50%;
                    width: 20px;
                    height: 20px;

                    svg {
                        width: 14px;
                        height: 14px;
                    }
                }

                &+* {
                    margin-top: 1.25rem;
                }
            }

            button {
                font: inherit;
                background-color: var(--c-indigo);
                border-radius: 6px;
                color: var(--c-white);
                font-weight: 500;
                font-size: 1.125rem;
                width: 100%;
                border: 0;
                padding: 1em;

                &:hover,
                &:focus {
                    background-color: var(--c-governor);
                }
            }
    </style>

    </head>

    <body>
        <!-- =============== Navigation ================ -->
        <div class="container">
            <div class="navigation">
                <ul>
                    <li style="text-align: center;">
                        <a href="#">
                            <span class="title">DC</span>
                        </a>
                    </li>


                    <li>
                        <a href="">
                            <span class="icon">
                                <ion-icon name="stats-chart-outline"></ion-icon>
                            </span>
                            <span class="title">Statistiques</span>
                        </a>
                    </li>

                    <li>
                        <a href="#section2">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Partenaires</span>
                        </a>
                    </li>

                    <li>
                        <a href="#section3">
                            <span class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </span>
                            <span class="title">Clients</span>
                        </a>
                    </li>

                    <li>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a href="#"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- ========================= Main ==================== -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>

                    <div class="search">
                        <label>
                            <input type="text" placeholder="Search here">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>

                    <img src="/logo.svg" alt="">
                </div>



                <!-- ======================= Cards ================== -->
                <div class="cardBox">
                    @php
                        $totalClients = \App\Models\Client::count();
                    @endphp
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalClients }}</div>
                            <div class="cardName">Total clients</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>

                    @php
                        $totalPartners = \App\Models\partenaire::count();
                    @endphp
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalPartners }}</div>
                            <div class="cardName">Total partenaires</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>

                    @php
                        $totalDemandes = \App\Models\demande::count();
                    @endphp
                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalDemandes }}</div>
                            <div class="cardName">Total demandes</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div>
                    </div>

                    @php
                        $totalInterventions = \App\Models\Intervention::count();
                    @endphp

                    <div class="card">
                        <div>
                            <div class="numbers">{{ $totalInterventions }}</div>
                            <div class="cardName">Total interventions</div>
                        </div>
                        <div class="iconBx">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>

                        </div>
                    </div>
                </div>

                <!-- ================ Add Charts JS ================= -->
                <div class="chartsBx">
                    <div class="chart"> <canvas id="chart-1">
                            <input type="hidden" id="likeCount" value="{{ $likeCount }}">
                            <input type="hidden" id="dislikeCount" value="{{ $dislikeCount }}">


                        </canvas> </div>
                    <div class="chart"> <canvas id="chart-2">
                            <input type="hidden" id="labels" value="{{ json_encode($labels) }}">
                            <input type="hidden" id="data" value="{{ json_encode($data) }}">

                        </canvas> </div>

                </div>


                <br>

                <!-- ================ Order Details List ================= -->



                <section id="section2"><br><br><br>
                    <h1 style="margin-left: 20px;">Disponibilite des partenaires</h1>
                    <div class="details">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Partenaires</h2>
                                <a href="#" class="btn">View All</a>
                            </div>


                            <table>
                                <thead>
                                    <tr>
                                        <td>Email</td>
                                        <td>Service</td>
                                        <td>Ville</td>
                                        <td>Disponibilité</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $ser)
                                        <tr>
                                            <td>{{ $ser->email }}</td>
                                            <td>{{ $ser->nom }}</td>
                                            <td>{{ $ser->ville }}</td>
                                            <td>{{ $ser->is_available }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <!-- ================= New Customers ================ -->

                        <div class="recentCustomers">
                            <div class="cardHeader">
                                <h2>Nouveau partenaires</h2>
                            </div>

                            <table>
                                @foreach ($partenaires as $partenaire)
                                    <tr>
                                        <td width="60px">
                                            <div class="imgBx"><img
                                                    src="/storage/partenaires/{{ $partenaire->image }}">
                                            </div>
                                        </td>
                                        <td>
                                            <h4>{{ $partenaire->nom }}<br><span>{{ $partenaire->prenom }}</span></h4>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                </section>
                <br><br><br><br><br><br>
                <!-- ================ Order Details List ================= -->


                <section id="section3">
                    <h1 style="margin-left: 25px;">Listes des Clients</h1>
                    <div class="details">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Clients</h2>
                                <a href="#" class="btn">View All</a>
                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <td>Nom</td>
                                        <td>Email</td>
                                        <td>Ville</td>
                                        <td>Telephone</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $cl)
                                        <tr>
                                            <td>{{ $cl->nom }} {{ $cl->prenom }} </td>
                                            <td>{{ $cl->email }}</td>
                                            <td>{{ $cl->ville }}</td>
                                            <td>{{ $cl->telephone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <!-- ================= New Customers ================ -->
                        <div class="recentCustomers">
                            <div class="cardHeader">
                            </div>

                            <article class="information [ card ]">
                                <span class="tag">Clientèle</span>
                                <h2 class="title">Une Relation Client Exceptionnelle</h2>
                                <p class="info">Nous valorisons chaque interaction avec nos clients, les traitant
                                    avec le plus grand respect et une attention personnalisée à chaque besoin.</p>
                                <button class="button">
                                    <span>Découvrir davantage</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                        width="24px" fill="none">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4v3z" fill="currentColor" />
                                    </svg>
                                </button>
                            </article>
                        </div>
                    </div>

                </section>

                <br><br><br><br><br><br>

            </div>
        </div>



        <!-- ======= Scripts ====== -->
        <script src="assets/js/main.js"></script>

        <!-- ======= Charts JS ====== -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

        <!-- Include the JavaScript file -->
        <script src="{{ asset('js/js-dash/chartsJS.js') }}"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- =========== Scripts =========  -->
        <script src="/js/js-dash/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>








    </body>

</html>

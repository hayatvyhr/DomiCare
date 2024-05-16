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

    </style>

    <body>
        <!-- =============== Navigation ================ -->

        <div class="container">
            @include('components.sidebar_dash')

            <!-- ========================= Main ==================== -->



            <div class="main">

                @include('components.navbar_dash')

                <div class="details">
                    <div class="tableHeader">
                        <h1 align="center">Demandes</h1>
                        <!DOCTYPE html>


                    </div>
                    <br>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID Demande</th>
                                <th>Date Reservation</th>
                                <th>Client</th>
                                <th>Prix</th>
                                <th>Durée</th>
                                <th>Catégorie</th>
                                <th>Intervention</th>
                                <th>Ville</th>
                                <th>État</th>
                                <th>Voir profil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->id_demande }}</td>
                                    <td>{{ $demande->date_reservation }}</td>
                                    <td>{{ $demande->client_prenom }} {{ $demande->client_nom }}</td>
                                    <td>{{ $demande->prix_total }}</td>
                                    <td>{{ $demande->duree }}</td>
                                    <td>{{ $demande->categorie_nom }}</td>
                                    <td>{{ $demande->intervention_nom }}</td>
                                    <td>{{ $demande->ville }}</td>
                                    <td>
                                        @if ($demande->etat == 'accepted')
                                            <form
                                                action="{{ route('demande.terminer', ['id_demande' => $demande->id_demande]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    style="background-color: green; color: white;">Terminer</button>
                                            </form>
                                        @elseif ($demande->etat == 'refused')
                                            <span style="color: red; font-size: 16px; font-weight: bold;">Refused</span>
                                        @elseif ($demande->etat == 'terminer')
                                            <span
                                                style="color: red; font-size: 16px; font-weight: bold;">Terminer</span>
                                        @else
                                            <form
                                                action="{{ route('demande.accept', ['id_demande' => $demande->id_demande]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    style="background-color: green; color: white;">Accepter</button>
                                            </form>
                                            <br>
                                            <form
                                                action="{{ route('demande.refuse', ['id_demande' => $demande->id_demande]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    style="background-color: red; color: white;">Refuser</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard-profil-client', $demande->id_client) }}"
                                            class="btn btn-primary">Visit Profil</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="text-align: center;">No demandes to display</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>



                </div>



            </div>
        </div>

        <!-- =========== Scripts =========  -->
        <script src="/js/js-dash/main.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>

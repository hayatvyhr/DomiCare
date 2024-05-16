<div class="navigations">
    <ul>
        <li>
            <a href="#">
                <!-- <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span> -->
                <span class="title">DommiCare</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard-partenaire') }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard-partenaire-profil') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Profil</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard-partenaire-demandes') }}">
                <span class="icon">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </span>
                <span class="title">Demandes</span>
            </a>
        </li>
        <!--Ajouter et ajoutee-->
        <li>
            <a href="{{ route('dashboard-partenaire-service') }}">
                <span class="icon">
                    <ion-icon name="help-outline"></ion-icon>
                </span>
                <span class="title">Services</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard-partenaire-comments') }} ">
                <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </span>
                <span class="title">Commentaire</span>
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
                <span class="title">Log Out</span>
            </a>
        </li>
    </ul>
</div>

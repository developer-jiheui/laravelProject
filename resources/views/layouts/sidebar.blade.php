@section('sidebar')
    <!--
      - #SIDEBAR
    -->

<aside class="sidebar" data-sidebar>

    <div class="sidebar-info">

        <figure class="avatar-box">
            <img src="{{asset('images/my-avatar.png')}}" alt="Jiheui Lee" width="80">
        </figure>

        <div class="info-content">
            <h1 class="name" title="my-name">Jiheui Lee</h1>
            <!---타이틀-->
            <p class="title">Full Stack Developer</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
            <span>Show Contacts</span>

            <ion-icon name="chevron-down"></ion-icon>
        </button>

    </div>

    <div class="sidebar-info_more">

        <div class="separator"></div>

        <ul class="contacts-list">

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Email</p>
                    <!-- email-->
                    <a href="mailto:developer.jiheuilee@gmail.com" class="contact-link">developer.jiheuilee<br>@gmail.com</a>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="phone-portrait-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Phone</p>
                    <!-- phoneNum-->
                    <a href="tel:+17786807220" class="contact-link">+1 (778) 680-7220</a>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Birthday</p>
                    <!-- Bday-->
                    <time datetime="1991-07-22">July 22, 1991</time>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="location-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Location</p>
                    <!---address-->
                    <address>1026 Commercial Dr,Vancouver, BC, Canada</address>
                </div>

            </li>

        </ul>

        <!-- SNS -->
        <div class="separator"></div>

        <ul class="social-list">

            <li class="social-item">
                <a href="https://www.linkedin.com/in/jiheuilee/" class="social-link">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="https://github.com/developer-jiheui" class="social-link">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="#" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>

        </ul>

    </div>

</aside>

@endsection



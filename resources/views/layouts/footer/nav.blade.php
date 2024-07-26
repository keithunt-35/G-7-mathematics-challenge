<footer class="footer">
    <div class="container @auth-fluid @endauth">
        <nav>
           <!-- Don't want this in our footer
            <ul class="footer-menu">
                <li>
                    <a href="https://www.creative-tim.com" class="nav-link" target="_blank">{{ __('Creative Tim') }}</a>
                </li>
                <li>
                    <a href="https://www.updivision.com" class="nav-link" target="_blank">{{ __('Updivision') }}</a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">{{ __('About Us') }}</a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">{{ __('Blog') }}</a>
                </li>
            </ul> -->
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="http://www.creative-tim.com">{{ __('G-7') }}</a> &amp; <a href="https://www.updivision.com">{{ __('Mathematics Challenge') }}</a> {{ 'Unlocking the Powerof Maths!') }}
            </p>
        </nav>
    </div>
</footer>

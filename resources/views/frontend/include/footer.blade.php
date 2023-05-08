<footer class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="footer-logo col-md-4 text-left">
                <a class="footer-brand" href="{{ url('/') }}">
                    <span class="footer-logo">
                        <img class="footer-logo" src="/images/{{ $existing_setting->logo }}">
                    </span>
                </a>

            </div>
            <div class="col-md-4 text-center">
                <div class="footer-mid">
                    <p>Find Us On Social Media:</p>
                    <p class="social">
                        <a href="{{ $existing_setting->facebook }}" target="blank">
                            <i class="fa-brands fa-facebook fa-xl"></i>
                        </a>
                        <a href="{{ $existing_setting->twitter }}" target="blank">
                            <i class="fa-brands fa-twitter fa-xl"></i>
                        </a>
                        <a href="{{ $existing_setting->instagram }}" target="blank">
                            <i class="fa-brands fa-instagram fa-xl"></i>
                        </a>
                        <a href="{{ $existing_setting->linkedin }}" target="blank">
                            <i class="fa-brands fa-linkedin fa-xl"></i>
                        </a>
                    </p>
                    <p>&copy; {{ $existing_setting->copyright }}</p>
                </div>

            </div>
            <div class="col-md-4 text-center">
                <span class="footer-mid">
                    <p>
                        For any query, Mail us <br>
                        {{ $existing_setting->email }}
                    </p>

                </span>
            </div>
        </div>
    </div>
</footer>

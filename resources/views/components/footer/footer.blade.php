<footer class="acr-footer" style="--acr-footer-img: url('{{ asset('images/footerbg.png') }}')">
    <div class="container position-relative">
        <div class="row gy-4 pt-5 pb-4 align-items-start">
            <div class="col-12 col-md-3 text-center text-md-start">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/amalogo.png') }}"
                         alt="Amaryllis Cove Resorts"
                         class="img-fluid acr-footer-logo">
                </a>
            </div>
            <div class="col-6 col-md-2">
                <h5 class="acr-footer-title">The Hotel</h5>
                <ul class="list-unstyled acr-footer-list mb-0">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/rooms') }}">Rooms</a></li>
                    <li><a href="{{ url('/amenities') }}">Amenities</a></li>
                    <li><a href="{{ url('/reservations') }}">Reservations</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <h5 class="acr-footer-title">Contact Us</h5>
                <address class="acr-footer-list mb-2">
                    New Seaside Drive, Entertainment<br>
                    City Parañaque City, 1701,<br>
                    Metro Manila, Philippines
                </address>
                <p class="acr-footer-list mb-0">
                    <a href="tel:+639285964381">(+63) 928-396-8381</a><br>
                    <a href="mailto:reservation.amaryllis@gmail.com">reservation.amaryllis@gmail.com</a>
                </p>
            </div>
            <div class="col-12 col-md-3">
                <h5 class="acr-footer-title">Guest Information</h5>
                <ul class="list-unstyled acr-footer-list mb-0">
                    <li><a href="{{ url('/generalpolicy') }}">General policy</a></li>
                    <li><a href="{{ url('/privacypolicy') }}">Privacy &amp; Policy</a></li>                </ul>
            </div>
        </div>

        <hr class="acr-footer-divider my-0">

        <div class="py-3">
            <small class="acr-footer-copy">
                &copy; {{ date('Y') }} Amaryllis Cove Resorts. All Rights Reserved.
            </small>
        </div>
    </div>
</footer>

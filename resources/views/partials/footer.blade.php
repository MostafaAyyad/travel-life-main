<section class="footer">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="nav__logo">
                        <a href="#" class="logo" style="color: black;">LifeEase Travel</a>
                    </div>
                    <p style="text-align: left; margin-top: 30px;">
                        Explore the world with ease and excitement through our comprehensive travel platform. Your
                        journey begins here, where
                        seamless planning meets unforgettable experiences.
                    </p>
                    <div class="socilMedia">
                        <div class="fas">

                        </div>
                        <div class="fas">

                        </div>
                        <div class="fas">

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="Quicklinks">
                        <h4>Quick Links</h4>
                        <a href="#">Home</a>
                        <a href="#">Flights</a>
                        <a href="#">Hotels</a>
                        <a href="#">Cruise</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="Quicklinks">
                        <h4>Contact Us</h4>
                        <a href="#"><span><i class="ri-phone-fill"></i></span>+91 9876543210</a>
                        <a href="#">
                            <span><i class="ri-record-mail-line"></i></span> info@skywings
                        </a>
                        <a href="#">
                            <span><i class="ri-map-pin-2-fill"></i></span> New Delhi, India
                        </a>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="Quicklinks">
                        <h4>Subscribe</h4>
                        <form method="POST" action="{{ route('dashboard.subscribe.store') }}">
                            @csrf
                            <input type="email" name="email" placeholder="Enter Your email" required class="form-control mt-2 mb-2">
                            <button type="submit" class="btn btn-primary Subscribe">Subscribe</button>
                        </form>
                        {{-- <input placeholder="Enter Your email"> --}}
                        {{-- <a href="#" class="btn btn-primary Subscribe">Subscribe</a> --}}
                    </div>
                </div>

            </div>
    </footer>
</section>

<p class="Copyright">Copyright © 2024 ABEDALLA EMARA. All rights reserved.</p>

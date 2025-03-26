<section class="contact py-5 text-center">
    <div class="container">
        <div class="row">
            <h3 class="text-lg font-bold mb-4">Have any inquiry? Drop us few lines!</h3>

            <div class="col-md-6">
                @if(session('successContact'))
                    <div class="alert alert-success">
                        {{ session('successContact') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>

            <div class="col-md-6 d-flex flex-column justify-content-center">
                <div class="contact-content text-start">
                    <h2 class="text-blue-600 fw-bold">Get in Touch</h2>
                    <p>Explore the world with ease and excitement through our comprehensive travel platform.</p>
                    <p>We are happy to answer any inquiries you may have. Our team will respond within 24 hours.</p>
                </div>
            </div>
        </div>
    </div>
</section>

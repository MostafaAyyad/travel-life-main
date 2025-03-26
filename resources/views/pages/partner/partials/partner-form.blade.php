<section id="partner-form" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Become a Partner</h2>
                <p class="lead">Fill out our partner form to express your interest in becoming a partner with us.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                <div class="alert alert-success text-center my-3">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{ route('partner.submit') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Your Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" name="company_name" class="form-control form-control-lg" placeholder="Company Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea name="reason" class="form-control form-control-lg" placeholder="Tell us why you'd like to partner with us" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Your Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="url" name="website" class="form-control form-control-lg" placeholder="Your Website" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Submit</button>
                </form>

            </div>
        </div>
    </div>
</section>

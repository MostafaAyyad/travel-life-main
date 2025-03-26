<section class="contact-form-section py-5 bg-light">
    <div class="container">
      <div class="row">


        <div class="text-center mb-4">
            <h2 class="text-center font-bold  text-5xl">Contact Form</h2>
            <p class="text-muted">Feel free to send us a message below. We aim to respond within 24 hours.</p>
        </div>
        <div class="col-md-2"></div>
        <form method="POST" action="{{ route('contact.form.store') }}" class="p-4 shadow-sm rounded bg-white col-md-8 ">
            @csrf
            @if(session('success'))
            <div class="alert alert-success mt-3 text-green-700">{{ session('success') }}</div>
        @endif
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="form_name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="form_email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="form_subject" class="form-control" placeholder="Subject">
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone-number" class="form-control" placeholder="Phone">
                </div>
                <div class="col-12">
                    <textarea name="form_message" class="form-control" placeholder="Your Message" rows="6" required></textarea>
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn bg-blue-600 text-white float-left px-3" style="font-size: 15px;">Send Message</button>
                </div>
            </div>
        </form>


        <div class="col-md-2"></div>
    </div>
  </div>
</section>

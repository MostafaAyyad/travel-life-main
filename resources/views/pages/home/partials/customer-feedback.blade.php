<section class="feedback">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 mb-5">
                <h1 class="display-4 text-primary">Customer Feedback</h1>
                <p class="lead">Tell us what you think about our service</p>
            </div>
        </div>

        <div class="row">
            @foreach($feedbacks as $feedback)
            <div class="col-md-3 mb-4">
                <div class="feedback-card shadow-lg">
                    <img src="{{ asset('storage/' . $feedback->image) }}" class="card-img-top" alt="{{ $feedback->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $feedback->name }}</h5>
                        <p class="card-text">{{ $feedback->comment }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

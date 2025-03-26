<section class="services-section">
    <div class="container">
        <h2 class="text-center mb-5">Our Expertise</h2>
        <div class="row">
            @foreach($services as $service)
                @if($service->status == 1)
                    <div class="col-md-4 mb-4">
                        <div class="card service-card shadow-sm">
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="{{ $service->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->title }}</h5>
                                <p class="card-text">{{ $service->description }}</p>
                                <a href="{{ route('requestservice', ['service_id' => $service->id]) }}" class="btn btn-primary">Request it</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

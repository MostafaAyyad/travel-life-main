<section class="category" id="service">
    <div class="container">
        <div class="row">
            <div class="service">
                <h1>Ouer trip</h1>
                <p id="service">
                    Highlight of exclusiv travel service and experiences
                </p>
            </div>
            <div class="serviceSection">
            @foreach($services as $service)
                @if($service->status == 1)
                    <div class="col-md-4">
                        <div class="card" style="width: 95%;">
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top h-[250px]">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->title }}</h5>
                                <p class="card-text mb-2">{{ $service->description }}</p>
                                <a href="{{ route('requestservice', ['service_id' => $service->id]) }}" class="btn btn-primary">Request One</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
            <div class="Dark">
                <a href="{{ route('services.index') }}"><button type="button" class="btn btn-dark Gosomewhere"
                        style="margin-right: 5px;">See More</button></a>
                <a href="{{ route('requestservice') }}" class="btn btn-primary Gosomewhere">request servise</a>
            </div>
        </div>
    </div>
</section>

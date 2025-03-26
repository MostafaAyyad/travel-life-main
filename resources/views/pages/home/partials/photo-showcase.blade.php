<section class="photoShowcase">
    <div class="container">
        <div class="row text-center">
            <h1 class="display-4">Photo Showcase</h1>
            <p class="lead">Explore our stunning destinations and exclusive experiences.</p>
        </div>

        <div class="row">
            @foreach($photos as $index => $photo)
            <div class="col-md-4 mb-4">
                <div class="card showcase-card">
                    <img src="{{ asset('storage/' . $photo->image) }}" class="card-img-top Showcase-img" alt="Destination 1" style="height: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photo->title }}</h5>
                        <p class="card-text">{{ $photo->description }}</p>
                        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#imageModal{{ $photo->id }}">View
                            Full Image</button>
                    </div>
                </div>
            </div>
              <!-- Modal for Full Image View -->
            <div class="modal fade" id="imageModal{{ $photo->id }}" tabindex="-1" aria-labelledby="imageModal{{ $photo->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $photo->image) }}" class="d-block w-100" alt="Destination 1">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>



    </div>
</section>

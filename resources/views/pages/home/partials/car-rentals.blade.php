<section>
    <div class="container bg-white shadow-lg rounded-lg p-4">
        <h2 class="text-center text-2xl font-bold mb-4">Car Rental Offers</h2>
        <div class="row">
            @foreach($cars as $index => $car)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $car->image) }}"  class="card-img-top" alt="Car Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title font-bold">{{ $car->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($car->description, 50) }}</p>
                        <button class="btn btn-primary w-100 mt-2">Order Now</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

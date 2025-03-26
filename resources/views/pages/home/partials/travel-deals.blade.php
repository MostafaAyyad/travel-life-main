<section>
    <div class="container mx-auto px-4 my-16">
        <h2 class="text-2xl font-bold text-[#002E8B] text-center mb-6">Travel deals under $190</h2>

        <div id="travelDealsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($travelDeals as $index => $deal)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="flex justify-center mb-5">
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden w-80">
                                <img src="{{ asset('storage/' . $deal->image) }}" class="w-full16 h-14 object-cover rounded">

                                <div class="p-4 text-center">
                                    <h3 class="text-lg font-bold text-[#002E8B]">{{ $deal->title }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $deal->description }}</p>
                                    <p class="mt-2 font-bold text-[#002E8B]">From ${{ $deal->price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#travelDealsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#travelDealsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

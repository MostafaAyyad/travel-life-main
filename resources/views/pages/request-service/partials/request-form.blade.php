<div class="container mt-5 form-question bg-white p-4 rounded shadow" >
    <h1 style="margin-bottom: 20px;" class="text-lg font-bold mb-2">Request Form</h1>
    @if($selectedService)
        <div class="alert alert-info">
            <h5>Service Information:</h5>
            <p><strong>Name:</strong> {{ $selectedService->title }}</p>
            <p><strong>Description:</strong> {{ $selectedService->description }}</p>
            <img src="{{ asset('storage/' . $selectedService->image) }}" alt="Service Image" style="width: 200px; height: auto;">
            <input type="hidden" name="service_id" value="{{ $selectedService->id }}">
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('service.request.store') }}"   id=" quoteForm">
        @csrf
        <input type="hidden" name="service_id" value="{{ $selectedService->id }}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Your Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" placeholder="Enter your name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" placeholder="Enter your email" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control form-control-lg" placeholder="Enter your phone number">
            </div>
            <div class="col-md-6 mb-3">
                <label>Country</label>
                <input type="text" name="country" value="{{ old('country') }}" class="form-control form-control-lg" placeholder="Enter your country" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Project Type</label>
                <select name="projectType" class="form-control form-control-lg" required>
                    <option value="" disabled {{ old('projectType') ? '' : 'selected' }}>Select project type</option>
                    @foreach($projectTypes as $type)
                        <option value="{{ $type->name }}" {{ old('projectType') == $type->name ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Estimate Budget</label>
                <input type="text" name="budget" value="{{ old('budget') }}" class="form-control form-control-lg" placeholder="Enter estimated budget">
            </div>
            <div class="col-md-6 mb-3">
                <label>Maximum Time for the Project</label>
                <input type="text" name="timeFrame" value="{{ old('timeFrame') }}" class="form-control form-control-lg" placeholder="Enter time frame">
            </div>
            <div class="col-md-6 mb-3">
                <label>Company Name</label>
                <input type="text" name="company" value="{{ old('company') }}" class="form-control form-control-lg" placeholder="Enter your company name">
            </div>
            <div class="col-md-12 mb-3">
                <label>Message</label>
                <textarea name="message" class="form-control form-control-lg" rows="4" placeholder="Enter your message">{{ old('message') }}</textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Request a service</button>
            </div>
        </div>
    </form>
</div>

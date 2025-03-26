<!-- Sidebar -->
<div class="w-1/5 bg-blue-900 text-white p-5 flex flex-col items-center">
    <img src="{{ asset('assets/client-1.jpg') }}" alt="User" class="w-24 h-24 rounded-full border-4 border-white mb-4">
    <h2 class="text-lg font-semibold">{{ Auth::user()->first_name }} <span>{{ Auth::user()->last_name }}</span></h2>
    <p class="text-sm">Chief Officer</p>
    <nav class="mt-6 w-full">
        <ul class="space-y-4 text-center">
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.profile.edit') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.profile.edit') }}">Edit Profile</a>
            </li>
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.dynamic-booking.index') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.dynamic-booking.index') }}">Dynamic Booking</a>
            </li>
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.dynamic-booking.entries') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.dynamic-booking.entries') }}">Dynamic Booking Entries</a>
            </li>
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.services.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.services.index') }}">Services</a>
            </li>
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.service_requests.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.service_requests.index') }}">Service Requests</a>
            </li>
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.partners.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.partners.index') }}">Partners</a>
            </li>
            <li class="p-3 rounded cursor-pointer {{ request()->routeIs('dashboard.contacts.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.contacts.index') }}">Contact Messages</a>
            </li>
            <li class="p-3 {{ request()->routeIs('dashboard.contact_forms.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.contact_forms.index') }}">Contact Forms</a>
            </li>
            <li class="p-3 {{ request()->routeIs('dashboard.travel_deals.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.travel_deals.index') }}">Travel Deals</a>
            </li>
            <li class="p-3 {{ request()->routeIs('dashboard.car-rental.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.car-rental.index') }}">Car Rental</a>
            </li>
            <li class="p-3 {{ request()->routeIs('dashboard.photo-showcases.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.photo-showcases.index') }}">Photo Showcases</a>
            </li>
            <li class="p-3 {{ request()->routeIs('dashboard.feedback.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.feedback.index') }}">FeedBack</a>
            </li>
            <li class="p-3 {{ request()->routeIs('dashboard.subscriptions.*') ? 'bg-blue-700' : 'hover:bg-blue-700' }}">
                <a href="{{ route('dashboard.subscriptions.index') }}">Subscriptions</a>
            </li>
        </ul>
    </nav>
</div>

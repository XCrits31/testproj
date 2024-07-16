<div class="sidebar">
    <nav class="nav flex-column">
        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="nav-link" href="{{ route('events.index') }}">Events</a>
        <a class="nav-link" href="{{ route('venues.index') }}">Venues</a>

        @include('components.weather')

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x :href="route('logout')"
                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                <pre>  {{ __('logout') }} </pre>
            </x>
        </form>
            </nav>
        </div>

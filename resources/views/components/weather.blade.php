<div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="weatherDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Weather Info
    </a>
    <div class="dropdown-menu" aria-labelledby="weatherDropdown">
        @if(isset($weather))
            @php
                $temperature = $weather['hours'][0]['airTemperature']['sg'];
                $windSpeed = $weather['hours'][0]['windSpeed']['sg'];
            @endphp
            <a class="dropdown-item">Temperature: {{ $temperature }}°C</a>
            <a class="dropdown-item">Wind Speed: {{ $windSpeed }} m/s</a>
        @endif
    </div>
</div>

<li class="nav-item">
    <a href="{{ route('passengerStats.index') }}"
       class="nav-link {{ Request::is('passengerStats*') ? 'active' : '' }}">
        <p>Passenger Stats</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>



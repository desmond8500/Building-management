<li class="nav-item {{ Request::is('clients*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('clients.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Clients</span>
    </a>
</li>
<li class="nav-item {{ Request::is('compteurs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('compteurs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Compteurs</span>
    </a>
</li>
<li class="nav-item {{ Request::is('appartements*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('appartements.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Appartements</span>
    </a>
</li>
<li class="nav-item {{ Request::is('factures*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('factures.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Factures</span>
    </a>
</li>
<li class="nav-item {{ Request::is('contrats*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contrats.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Contrats</span>
    </a>
</li>

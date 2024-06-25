<div class="modules-container">
    @if ($turns)
        <div id="modulo1">
            <h2>Módulo 1</h2>
            <p>Turno actual: <span id="turno_modulo1">{{ $turns->modulo1 }}</span></p>
        </div>
        <div id="modulo2">
            <h2>Módulo 2</h2>
            <p>Turno actual: <span id="turno_modulo2">{{ $turns->modulo2 }}</span></p>
        </div>
        <div id="modulo3">
            <h2>Módulo 3</h2>
            <p>Turno actual: <span id="turno_modulo3">{{ $turns->modulo3 }}</span></p>
        </div>
    @endif
</div>

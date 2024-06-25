<div class="modules">
    <div id="modulo1" class="module">
        <h2 class="font-bold text-xl">Módulo 1</h2>
        <p>Atendiendo Turno: <span id="turno_modulo1" class="font-bold">{{ $modulo1 }}</span></p>
        <button wire:click="updateTurns('modulo1')"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
    </div>
    <div id="modulo2" class="module">
        <h2 class="font-bold text-xl">Módulo 2</h2>
        <p>Atendiendo Turno: <span id="turno_modulo2" class="font-bold">{{ $modulo2 }}</span></p>
        <button wire:click="updateTurns('modulo2')"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
    </div>
    <div id="modulo3" class="module">
        <h2 class="font-bold text-xl">Módulo 3</h2>
        <p>Atendiendo Turno: <span id="turno_modulo3" class="font-bold">{{ $modulo3 }}</span></p>
        <button wire:click="updateTurns('modulo3')"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 next">Siguiente</button>
    </div>
</div>

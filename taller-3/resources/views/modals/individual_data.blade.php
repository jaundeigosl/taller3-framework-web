<div id="viewModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm overflow-y-auto w-full h-full justify-center items-center flex opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300" id="modalContent">
        
        <div class="bg-slate-800 px-6 py-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-white">Detalles del Empleado</h3>
            <button onclick="cerrarModal()" class="text-slate-300 hover:text-white text-2xl leading-none">&times;</button>
        </div>

        <div class="p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase">Cédula</p>
                    <p class="text-slate-800 font-medium" id="m_cedula"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase">Cargo</p>
                    <p class="text-slate-800 font-medium" id="m_cargo"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase">Nombres</p>
                    <p class="text-slate-800 font-medium" id="m_nombre"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase">Apellidos</p>
                    <p class="text-slate-800 font-medium" id="m_apellido"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase">Edad</p>
                    <p class="text-slate-800 font-medium" id="m_edad"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase">Género</p>
                    <p class="text-slate-800 font-medium" id="m_genero"></p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-slate-500 font-semibold uppercase">Estado Civil</p>
                    <p class="text-slate-800 font-medium" id="m_estado_civil"></p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-slate-500 font-semibold uppercase">Dirección Completa</p>
                    <p class="text-slate-800 font-medium bg-slate-50 p-3 rounded border border-slate-100" id="m_direccion"></p>
                </div>
            </div>
        </div>

        <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex justify-end">
            <button onclick="cerrarModal()" class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-semibold py-2 px-6 rounded-lg transition-colors">
                Cerrar
            </button>
        </div>
    </div>
</div>
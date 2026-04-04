<div id="viewModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm w-full h-full justify-center items-center flex opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]" id="modalContent">
        
        <div class="bg-slate-800 px-6 py-4 flex justify-between items-center shrink-0">
            <h3 class="text-lg font-bold text-white">Detalles del Registro</h3>
            <button onclick="cerrarModal()" class="text-slate-300 hover:text-white text-2xl leading-none">&times;</button>
        </div>

        <div class="p-6 overflow-y-auto flex-grow">
            <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Cédula</p>
                    <p class="text-slate-800 font-medium" id="m_cedula"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Cargo</p>
                    <p class="text-slate-800 font-medium" id="m_cargo"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Nombres</p>
                    <p class="text-slate-800 font-medium" id="m_nombre"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Apellidos</p>
                    <p class="text-slate-800 font-medium" id="m_apellido"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Edad</p>
                    <p class="text-slate-800 font-medium" id="m_edad"></p>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Género</p>
                    <p class="text-slate-800 font-medium" id="m_genero"></p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Estado Civil</p>
                    <p class="text-slate-800 font-medium" id="m_estado_civil"></p>
                </div>
                <div class="col-span-2">
                    <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Dirección</p>
                    <p class="text-slate-800 font-medium bg-slate-50 p-3 rounded border border-slate-100" id="m_direccion"></p>
                </div>

                <div class="col-span-2 mt-2 pt-4 border-t border-slate-200">
                    <h4 class="text-sm font-bold text-slate-800 mb-4">Información de Contacto</h4>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-emerald-50 rounded-lg text-emerald-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 uppercase font-bold">Teléfonos</p>
                                <p class="text-sm text-slate-700 font-medium" id="m_telefono"></p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-blue-50 rounded-lg text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 uppercase font-bold">Correos</p>
                                <p class="text-sm text-slate-700 font-medium truncate max-w-[250px]" id="m_correo"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex justify-end shrink-0">
            <button onclick="cerrarModal()" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold py-2 px-8 rounded-lg transition-colors shadow-md">
                Cerrar
            </button>
        </div>
    </div>
</div>
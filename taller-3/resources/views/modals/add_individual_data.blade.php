<div id="createModal"
    class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm overflow-y-auto w-full h-full justify-center items-center flex opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4 overflow-hidden transform scale-95 transition-transform duration-300"
        id="createModalContent">

        <div class="bg-emerald-600 px-6 py-4 flex justify-between items-center">
            <h3 class="text-lg font-bold text-white">Registrar Nueva Data Personal</h3>
            <button onclick="cerrarModalCrear()"
                class="text-white hover:text-emerald-200 text-2xl leading-none">&times;</button>
        </div>

        <form action="{{ route('crud.create') }}" method="POST">
            @csrf

            <div class="p-6 space-y-4">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Cédula</label>
                        <input type="text" name="cedula" required
                            class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none"
                            placeholder="Ej: 20111222">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Cargo</label>
                        <input type="text" name="cargo" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none" placeholder="Ej: Analista">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Nombres</label>
                        <input type="text" name="nombre" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Apellidos</label>
                        <input type="text" name="apellido" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Edad</label>
                        <input type="number" name="edad" min="15" max="90" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Género</label>
                        <select name="genero" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Estado Civil</label>
                        <select name="estado_civil" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                            <option value="" disabled selected>Seleccione...</option>
                            <option value="soltero">Soltero/a</option>
                            <option value="casado">Casado/a</option>
                            <option value="divorciado">Divorciado/a</option>
                            <option value="viudo">Viudo/a</option>
                            <option value="concubinato">Concubinato</option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Dirección Completa</label>
                        <textarea name="direccion" rows="2" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none resize-none"></textarea>
                    </div>

                </div>

                <div class="mt-4 pt-4 border-t border-slate-200">
                    <h4 class="text-sm font-bold text-slate-800 mb-3">Datos de Contacto</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Teléfono Principal</label>
                            <input type="text" name="telefono_principal" id="telefono_principal" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none" placeholder="Ej: 0414-1234567">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Teléfono Secundario (Opcional)</label>
                            <input type="text" name="telefono_secundario" id="telefono_secundario" class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Correo Principal</label>
                            <input type="email" name="correo_principal" id="correo_principal" required class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase mb-1">Correo Secundario (Opcional)</label>
                            <input type="email" name="correo_secundario" id="correo_secundario" class="w-full px-3 py-2 rounded border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>

                    </div>
                </div>

            </div>
            <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex justify-end space-x-3">
                <button type="button" onclick="cerrarModalCrear()" class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-semibold py-2 px-6 rounded-lg transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition-colors">
                    Guardar Registro
                </button>
            </div>
        </form>
    </div>
</div>
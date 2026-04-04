@php
    $registros = $datos;
@endphp

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Directorio de Empleados</h1>
            <p class="text-slate-500 text-sm">Gestión de datos personales registrados en el sistema.</p>
        </div>
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg shadow-md">
                <div class="flex items-center mb-2">
                    <span class="text-red-800 font-bold uppercase text-xs tracking-wider">Errores detectados:</span>
                </div>
                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @error('error')
            <p>{{ $message }}</p>
        @enderror
        <button type="button" onclick="abrirModalCrear()"
            class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition-colors">
            + Crear Registro
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-100 text-slate-700 font-semibold border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3">Cédula</th>
                        <th class="px-4 py-3">Nombre Completo</th>
                        <th class="px-4 py-3">Edad</th>
                        <th class="px-4 py-3">Género</th>
                        <th class="px-4 py-3">Estado Civil</th>
                        <th class="px-4 py-3">Dirección</th>
                        <th class="px-4 py-3">Cargo</th>
                        <th class="px-4 py-3">Telefonos</th>
                        <th class="px-4 py-3">Emails</th>
                        <th class="px-4 py-3 text-right">Acciones</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($registros as $registro)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3">{{ $registro->cedula }}</td>
                            <td class="px-4 py-3 font-medium text-slate-800">
                                <div class="truncate max-w-[120px]"
                                    title="{{ $registro->nombre }} {{ $registro->apellido }}">
                                    {{ $registro->nombre }} {{ $registro->apellido }}
                                </div>
                            </td>
                            <td class="px-4 py-3">{{ $registro->edad }}</td>
                            <td class="px-4 py-3">{{ $registro->genero }}</td>
                            <td class="px-4 py-3">{{ $registro->estado_civil }}</td>
                            <td class="px-4 py-3">
                                <div class="truncate max-w-[150px]" title="{{ $registro->direccion }}">
                                    {{ $registro->direccion }}
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="bg-slate-100 text-slate-700 px-2 py-1 rounded text-xs font-semibold truncate max-w-[100px] inline-block">
                                    {{ $registro->cargo }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-slate-800">
                                    {{ $registro->phone->telefono_principal ?? 'Sin teléfono' }}
                                </div>
                                @if($registro->phone && $registro->phone->telefono_secundario)
                                    <div class="text-xs text-slate-500">{{ $registro->phone->telefono_secundario }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-slate-800 truncate max-w-[150px]"
                                    title="{{ $registro->email->correo_principal ?? '' }}">
                                    {{ $registro->email->correo_principal ?? 'Sin correo' }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-right space-x-2 whitespace-nowrap">
                                <button type="button" onclick="abrirModal({{ json_encode($registro) }})"
                                    class="text-sky-600 hover:text-sky-800 font-semibold text-xs px-2 py-1 bg-sky-50 rounded">
                                    Examinar
                                </button>

                                <button type="button" onclick="abrirModalEditar({{ json_encode($registro) }})"
                                    class="text-amber-600 hover:text-amber-800 font-semibold text-xs px-2 py-1 bg-amber-50 rounded">
                                    Editar
                                </button>

                                <a href="{{ route('crud.delete', ['id' => $registro->id]) }}"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')"
                                    class="text-red-600 hover:text-red-800 font-semibold text-xs px-2 py-1 bg-red-50 rounded transition-colors inline-block">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modals/read_individual_data')
@include('modals/put_individual_data')
@include('modals/add_individual_data')



<script>

    const modalCreate = document.getElementById('createModal');
    const modalCreateContent = document.getElementById('createModalContent');

    function abrirModalCrear() {
        modalCreate.classList.remove('hidden');
        setTimeout(() => {
            modalCreate.classList.remove('opacity-0');
            modalCreateContent.classList.remove('scale-95');
        }, 10);
    }

    function cerrarModalCrear() {
        modalCreate.classList.add('opacity-0');
        modalCreateContent.classList.add('scale-95');

        setTimeout(() => {
            modalCreate.classList.add('hidden');
            modalCreate.querySelector('form').reset();
        }, 300);
    }

    modalCreate.addEventListener('click', function (e) {
        if (e.target === modalCreate) cerrarModalCrear();
    });


    const modalView = document.getElementById('viewModal');
    const modalViewContent = document.getElementById('modalContent');

    function abrirModal(datos) {
        // Llenar datos personales
        document.getElementById('m_cedula').innerText = datos.cedula;
        document.getElementById('m_nombre').innerText = datos.nombre;
        document.getElementById('m_apellido').innerText = datos.apellido;
        document.getElementById('m_edad').innerText = datos.edad + ' años';
        document.getElementById('m_genero').innerText = datos.genero;
        document.getElementById('m_estado_civil').innerText = datos.estado_civil;
        document.getElementById('m_direccion').innerText = datos.direccion;
        document.getElementById('m_cargo').innerText = datos.cargo;

        if (document.getElementById('m_telefono')) {
            document.getElementById('m_telefono').innerText = datos.phone?.telefono_principal || 'No registrado';
        }
        if (document.getElementById('m_correo')) {
            document.getElementById('m_correo').innerText = datos.email?.correo_principal || 'No registrado';
        }

        modalView.classList.remove('hidden');
        setTimeout(() => {
            modalView.classList.remove('opacity-0');
            modalViewContent.classList.remove('scale-95');
        }, 10);
    }

    function cerrarModal() {
        modalView.classList.add('opacity-0');
        modalViewContent.classList.add('scale-95');

        setTimeout(() => {
            modalView.classList.add('hidden');
        }, 300);
    }

    modalView.addEventListener('click', function (e) {
        if (e.target === modalView) cerrarModal();
    });


    const modalEdit = document.getElementById('editModal');
    const modalEditContent = document.getElementById('editModalContent');

    function abrirModalEditar(datos) {
        document.getElementById('e_id').value = datos.id;
        document.getElementById('e_cedula').value = datos.cedula;
        document.getElementById('e_nombre').value = datos.nombre;
        document.getElementById('e_apellido').value = datos.apellido;
        document.getElementById('e_edad').value = datos.edad;
        document.getElementById('e_genero').value = datos.genero;

        let estadoCivil = datos.estado_civil ? datos.estado_civil.toLowerCase() : '';
        document.getElementById('e_estado_civil').value = estadoCivil;
        document.getElementById('e_direccion').value = datos.direccion;
        document.getElementById('e_cargo').value = datos.cargo;
        document.getElementById('e_telefono_principal').value = datos.phone?.telefono_principal || '';
        document.getElementById('e_telefono_secundario').value = datos.phone?.telefono_secundario || '';
        document.getElementById('e_correo_principal').value = datos.email?.correo_principal || '';
        document.getElementById('e_correo_secundario').value = datos.email?.correo_secundario || '';

        modalEdit.classList.remove('hidden');
        setTimeout(() => {
            modalEdit.classList.remove('opacity-0');
            modalEditContent.classList.remove('scale-95');
        }, 10);
    }

    function cerrarModalEditar() {
        modalEdit.classList.add('opacity-0');
        modalEditContent.classList.add('scale-95');

        setTimeout(() => {
            modalEdit.classList.add('hidden');
        }, 300);
    }

    modalEdit.addEventListener('click', function (e) {
        if (e.target === modalEdit) cerrarModalEditar();
    });

</script>
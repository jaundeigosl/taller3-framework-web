@php
    $registros = [];
@endphp

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Directorio de Empleados</h1>
            <p class="text-slate-500 text-sm">Gestión de datos personales registrados en el sistema.</p>
        </div>
        <a href="{{ route('crud.add') }}" class="bg-slate-800 hover:bg-slate-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition-colors">
            + Crear Registro
        </a>
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
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($registros as $registro)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-4 py-3">{{ $registro->cedula }}</td>
                        <td class="px-4 py-3 font-medium text-slate-800">
                            <div class="truncate max-w-[120px]" title="{{ $registro->nombre }} {{ $registro->apellido }}">
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
                            <span class="bg-slate-100 text-slate-700 px-2 py-1 rounded text-xs font-semibold truncate max-w-[100px] inline-block">
                                {{ $registro->cargo }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right space-x-2 whitespace-nowrap">
                            <button type="button" 
                                onclick="abrirModal({{ json_encode($registro) }})" 
                                class="text-sky-600 hover:text-sky-800 font-semibold text-xs px-2 py-1 bg-sky-50 rounded">
                                Examinar
                            </button>

                            <a href="#" class="text-amber-600 hover:text-amber-800 font-semibold text-xs px-2 py-1 bg-amber-50 rounded">
                                Editar
                            </a>

                            <form action="#" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de eliminar este registro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-xs px-2 py-1 bg-red-50 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('modals/individual_data')

<script>
    const modal = document.getElementById('viewModal');
    const modalContent = document.getElementById('modalContent');

    function abrirModal(datos) {
        document.getElementById('m_cedula').innerText = datos.cedula;
        document.getElementById('m_nombre').innerText = datos.nombre;
        document.getElementById('m_apellido').innerText = datos.apellido;
        document.getElementById('m_edad').innerText = datos.edad + ' años';
        document.getElementById('m_genero').innerText = datos.genero;
        document.getElementById('m_estado_civil').innerText = datos.estado_civil;
        document.getElementById('m_direccion').innerText = datos.direccion;
        document.getElementById('m_cargo').innerText = datos.cargo;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
        }, 10);
    }

    function cerrarModal() {
        modal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            cerrarModal();
        }
    });
</script>
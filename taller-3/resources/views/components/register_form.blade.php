<div class="flex-grow flex items-center justify-center p-4 my-8">
    
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden ml-64">
        
        <div class="bg-slate-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">Registro de Usuario</h2>
            <p class="text-slate-300 text-sm mt-1">Ingresa los datos</p>
        </div>

        <div class="p-8">
            <form action="{{ route('register.create') }}" method="POST" class="space-y-8">
                @csrf

                <div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nombre de Usuario</label>
                        <input type="text" name="username" value="{{ old('username') }}" required class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500 outline-none">
                        @error('username') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                   
                    </div>
                    <div  class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">
                        
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Contraseña</label>
                        <input type="password" name="password" required class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500 outline-none">
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        
                    </div>

                    <div  class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" required class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500 outline-none">
                    </div>


                    <div  class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Seleccione una pregunta de seguridad</label>
                            <input type="select" name="security_question" required class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500 outline-none">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Escriba la respuesta a la pregunta</label>
                            <input type="text" name="security_question_response" required class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500 outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-200">
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-slate-900 font-semibold transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 px-8 rounded-lg transition-colors shadow-md hover:shadow-lg">
                        Registrar Empleado
                    </button>
                </div>

            </form>
        </div>
        
    </div>
</div>
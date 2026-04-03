<div class="flex-grow flex items-center justify-center p-4">
    
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden ml-64">
        
        <div class="bg-slate-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">Recuperacion de contraseña</h2>
            <p class="text-slate-300 text-sm mt-1">Ingresa las credenciales necesarias</p>
        </div>

        <div class="p-8">
            <form action="{{ route('login.recovery') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="username" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nombre de Usuario
                    </label>
                    <input type="text" id="username" name="username" required autofocus class="w-full px-4 py-3 rounded-lg border border-slate-300 bg-slate-50 text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-colors"placeholder="Ej: jlopez"value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900 font-semibold transition-colors">
                    Cancelar
                </a>
                <button 
                    type="submit" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 flex justify-center items-center shadow-md hover:shadow-lg">
                    Recuperar Contraseña
                </button>
            </form>
        </div>
        
    </div>
</div>
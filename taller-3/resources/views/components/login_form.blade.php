<div class="flex-grow flex items-center justify-center p-4">
    
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden ml-64">
        
        <div class="bg-slate-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">Inicio de Sesion</h2>
            <p class="text-slate-300 text-sm mt-1">Ingresa las credenciales</p>
        </div>

        <div class="p-8">
            <form action="{{ route('login.auth') }}" method="POST" class="space-y-6">
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

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-3 rounded-lg border border-slate-300 bg-slate-50 text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:border-slate-500 transition-colors"placeholder="••••••••">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-slate-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-slate-800 focus:ring-slate-500">
                        <span class="ml-2">Recordar mi sesión</span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login.recovery_view') }}">¿Recuperar contraseña?</a>
                </div>

                <button 
                    type="submit" class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 flex justify-center items-center shadow-md hover:shadow-lg">
                    Iniciar Sesión
                </button>
            </form>
        </div>
        
    </div>
</div>
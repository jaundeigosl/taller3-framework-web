<nav class="bg-slate-800 shadow-md">
    <div class="max-w-6xl mx-auto">
        <ul class="grid grid-cols-4 gap-4 p-4 text-center">
            <li class="col-span-1">
                <a href="{{ route('home') }}"class="block py-2 text-slate-200 font-semibold rounded-lg hover:bg-slate-700 hover:text-white transition-colors duration-300">Home</a>
            </li>
            <li class="col-span-1">
                <a href="{{ route('crud.index') }}" class="block py-2 text-slate-200 font-semibold rounded-lg hover:bg-slate-700 hover:text-white transition-colors duration-300">Administracion</a>
            </li>
            <li class="col-span-1">
                <a href="#" class="block py-2 text-slate-200 font-semibold rounded-lg hover:bg-slate-700 hover:text-white transition-colors duration-300">Página 3</a>
            </li>
            @if (!Auth::user())
                <li class="col-span-1">
                    <a href="{{ route('register.index') }}" class="block py-2 bg-white text-black font-semibold rounded-lg hover:bg-slate-700 hover:text-white transition-colors duration-300">Registrarse</a>
                </li>
            @else
                <li class="col-span-1">
                    <a href="{{route('login.logout') }}" class="block py-2 bg-white text-red-500 font-semibold rounded-lg hover:bg-slate-700 hover:text-white transition-colors duration-300">Cerrar Sesión</a>
                </li>   
            @endif
        </ul>
    </div>
</nav>
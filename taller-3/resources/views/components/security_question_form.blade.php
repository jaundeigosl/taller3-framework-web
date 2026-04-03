<div class="flex-grow flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden ml-64">

        <div class="bg-slate-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">Recuperacion de contraseña</h2>
            <p class="text-slate-300 text-sm mt-1">Responda la pregunta de seguridad</p>
        </div>

        <div class="p-8">
            <form action="{{ route('login.recovery_question') }}" method="POST" class="space-y-6">
                @csrf
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <div class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Seleccione una pregunta de
                        seguridad</label>
                    <select name="security_question" required
                        class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500">
                        <option value="{{ $pregunta->id }}">{{$pregunta->pregunta}}</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-1 m-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Escriba la respuesta a la
                        pregunta</label>
                    <input type="text" name="security_question_response" required
                        class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-slate-50 focus:ring-2 focus:ring-slate-500 outline-none">
                </div>
                <a href="{{ route('home') }}" class="text-slate-600 hover:text-slate-900 font-semibold transition-colors">
                    Cancelar
                </a>
                <button type="submit"
                    class="w-full bg-slate-800 hover:bg-slate-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 flex justify-center items-center shadow-md hover:shadow-lg">
                    Aceptar
                </button>
            </form>
        </div>

    </div>
</div>
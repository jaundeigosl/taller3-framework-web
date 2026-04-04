<div class="max-w-6xl mx-auto p-4 mt-8">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-slate-800 border-b-2 border-slate-200 pb-2">
            {{ $title }}
        </h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center bg-white p-6 rounded-xl shadow-md border border-slate-100">
        <section>
            <p class="text-slate-600 text-lg leading-relaxed">
                 {{ $content }}
            </p>
        </section>
        <section>
            <img src={{ url('images/pantalla-del-panel-de-análisis-de-datos-inversión-empresarial-y-financiera-infografía-de-hud.webp') }} alt="Analisis de datos" class="w-full h-auto rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300">
        </section>

    </div>
</div>
<header class="bg-white shadow-sm sticky top-0 z-50 border-b border-slate-100">
    @include("components/navbar")

    <div class="max-w-7xl mx-auto px-4 py-6 md:px-6">
        @include("components/main-title", ['content' => $main_title])
    </div>
</header>

<section id="content-section"
    class="w-full p-8 md:p-6 my-8 flex flex-col-reverse md:flex-row gap-8 flex-grow">

    <div class="flex-1 space-y-8">
        @include("components/data_table")
    </div>

    <div class="w-full md:w-64 flex-shrink-0">
        <div class="md:sticky md:top-46">
            @include("components/side-menu")
        </div>
    </div>

</section>

<section class="mt-auto border-t border-slate-200 bg-white">
    <footer class="max-w-7xl mx-auto px-4 py-8 md:px-6 text-center text-sm text-slate-500">
        <p>&copy; 2026 Todos los derechos reservados.</p>
        @include("components/footer")
    </footer>
</section>
<nav class="bg-dark-red p-6 w-full">
    <div class="container mx-auto flex justify-between items-center">
        <div class="nav-links space-x-4 lg:flex hidden justify-center flex-1">
            <a href="/" class="text-white uppercase text-lg font-semibold px-4 py-2 rounded-lg hover:bg-black {{ request()->is('/') ? 'font-bold' : '' }}" style="font-family: 'Abolition', sans-serif;">Inici</a>
            <a href="/films" class="text-white uppercase text-lg font-semibold px-4 py-2 rounded-lg hover:bg-black {{ request()->is('films') ? 'font-bold' : '' }}" style="font-family: 'Abolition', sans-serif;">Películes</a>
            <a href="/games" class="text-white uppercase text-lg font-semibold px-4 py-2 rounded-lg hover:bg-black {{ request()->is('games') ? 'font-bold' : '' }}" style="font-family: 'Abolition', sans-serif;">Cotxes</a>
        </div>
        <div class="block lg:hidden flex justify-end flex-1 relative">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg id="menu-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg id="close-icon" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div id="mobile-menu" class="hidden absolute right-0 top-full mt-6 w-48 bg-white rounded-lg shadow-lg p-4">
                <div class="flex flex-col items-center">
                    <a href="/" class="block text-black uppercase text-lg font-semibold px-4 py-2 rounded-lg hover:bg-black {{ request()->is('/') ? 'font-bold' : '' }}" style="font-family: 'Abolition', sans-serif;">Inici</a>
                    <a href="/films" class="block text-black uppercase text-lg font-semibold px-4 py-2 rounded-lg hover:bg-black {{ request()->is('films') ? 'font-bold' : '' }}" style="font-family: 'Abolition', sans-serif;">Películes</a>
                    <a href="/games" class="block text-black uppercase text-lg font-semibold px-4 py-2 rounded-lg hover:bg-black {{ request()->is('games') ? 'font-bold' : '' }}" style="font-family: 'Abolition', sans-serif;">Cotxes</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Script per alternar el menú mòbil
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        menu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>

<style>
    .bg-dark-red {
        background-color: #8B0000; /* Vermell fosc */
    }
    body {
        overflow-x: hidden; /* Evita el desbordament horizontal */
    }
</style>

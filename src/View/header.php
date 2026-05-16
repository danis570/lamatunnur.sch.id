<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?? 'MADRASAH DINIYAH TAKMALIYAH AWALIYAH' ?></title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js (optional tapi recommended) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100">

    <header class="bg-white shadow relative" x-data="{ open: false }">

        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            <a href="/" class="inline-block">
                <h1 class="text-lg font-bold text-gray-800">
                    MADRASAH DINIYAH
                </h1>
            </a>

            <nav class="hidden md:flex gap-6 text-gray-600">
                <a href="#" class="hover:text-[#158684] transition">Home</a>
                <a href="#" class="hover:text-[#158684] transition">Santri</a>
                <a href="#" class="hover:text-[#158684] transition">Guru</a>
                <a href="#" class="hover:text-[#158684] transition">Laporan</a>
            </nav>

            <button @click="open = true" class="md:hidden text-gray-700 text-2xl">
                ☰
            </button>
        </div>

        <!-- OVERLAY (blur background) -->
        <div x-show="open" x-transition @click="open = false" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40">
        </div>

        <!-- MOBILE MENU (floating panel) -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-5"
            class="fixed top-20 left-1/2 -translate-x-1/2 w-11/12 max-w-sm bg-white rounded-xl shadow-lg z-50 p-6">

            <a href="#" class="block py-2 text-center hover:text-[#158684] transition">Home</a>
            <a href="#" class="block py-2 text-center hover:text-[#158684] transition">Santri</a>
            <a href="#" class="block py-2 text-center hover:text-[#158684] transition">Guru</a>
            <a href="#" class="block py-2 text-center hover:text-[#158684] transition">Laporan</a>

            <button @click="open = false" class="mt-4 w-full bg-gray-100 hover:bg-gray-200 py-2 rounded">
                Tutup
            </button>
        </div>

    </header>
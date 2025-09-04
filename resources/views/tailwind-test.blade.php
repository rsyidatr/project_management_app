<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TailwindCSS Test - Laravel</title>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <header class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">TailwindCSS berhasil diinstal!</h1>
                <p class="text-xl text-gray-600">Project Laravel dengan TailwindCSS v4 siap digunakan</p>
            </header>
            
            <!-- Content Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Fast Development</h3>
                    <p class="text-gray-600">TailwindCSS memungkinkan pengembangan UI yang cepat dengan utility classes.</p>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-green-500 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Responsive Design</h3>
                    <p class="text-gray-600">Built-in responsive utilities untuk semua device sizes.</p>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Customizable</h3>
                    <p class="text-gray-600">Mudah dikustomisasi sesuai dengan brand dan design system.</p>
                </div>
            </div>
            
            <!-- Buttons Example -->
            <div class="text-center space-x-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200">
                    Primary Button
                </button>
                <button class="bg-transparent hover:bg-blue-600 text-blue-600 hover:text-white font-bold py-3 px-6 border border-blue-600 rounded-lg transition-colors duration-200">
                    Secondary Button
                </button>
            </div>
            
            <!-- Status -->
            <div class="mt-12 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-center">
                <p class="font-semibold">✅ TailwindCSS v4 berhasil diintegrasikan dengan Laravel 10 + Vite 5</p>
            </div>
        </div>
    </div>
</body>
</html>

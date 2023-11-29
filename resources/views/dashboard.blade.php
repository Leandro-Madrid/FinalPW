<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col items-center">
                    <div>
                        <a class="navbar-brand" href="{{ route('web.index') }}">
                            <img src="{{ asset('toy.png') }}" alt="Logo">
                        </a>
                    </div>
    
                    <div class="mt-4">
                        <a href="{{ route('web.index') }}" class="ml-4">Volver al menú</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
</x-app-layout>

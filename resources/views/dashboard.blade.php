<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-3xl font-semibold mb-4">Reservas a tu nombre</h2>
                    @if ($reservations->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">No hay reservas a su nombre disponibles.</p>
                    @else
                        <ul class="list-disc pl-5 space-y-2">
                            @foreach ($reservations as $reservation)
                                <li class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow">
                                    {{ $reservation->user->name }} ha reservado una reunion con "{{ $reservation->property->user->name }}" en relacion a su propiedad
                                     "{{ $reservation->property->title }}" situada en "{{ $reservation->property->address }}" , sea paciente, en breve contactaremos con usted.
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

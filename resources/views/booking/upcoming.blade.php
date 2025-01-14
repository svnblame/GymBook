<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Upcoming Classes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @forelse ($bookings as $class)
                    <div class="py-6">
                        <div class="flex gap-6 justify-between">
                            <div>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-400">{{ $class->classType->name }}</p>
                                <p class="text-sm text-gray-900 dark:text-gray-400">{{ $class->instructor->name }}</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="text-lg font-bold text-gray-900 dark:text-gray-400">{{ $class->date_time->format('g:i a') }}</p>
                                <p class="text-sm text-gray-900 dark:text-gray-400">{{ $class->date_time->format('jS M') }}</p>
                            </div>
                        </div>
                        <div class="mt-1 text-right">
                            <form method="post" action="{{ route('booking.destroy', $class->id) }}">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="px-3 py-1" onclick="return confirm('Are you sure you want to delete the scheduled class?')">Cancel</x-danger-button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div>
                        <p>You have no upcoming classes booked at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

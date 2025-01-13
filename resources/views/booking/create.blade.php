<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Book a Class
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @forelse ($scheduledClasses as $class)
                    <div class="py-6">
                        <div class="flex gap-6 justify-between">
                            <div>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-400">{{ $class->classType->name }}</p>
                                <p class="text-sm text-gray-900 dark:text-gray-400">{{ $class->instructor->name }}</p>
                                <p class="mt-2 text-gray-900 dark:text-gray-400">{{ $class->classType->description }}</p>
                                <span class="text-slate-600 dark:text-slate-400 text-sm">{{ $class->classType->minutes }} minutes</span>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <p class="text-lg font-bold text-gray-900 dark:text-gray-400">{{ $class->date_time->format('g:i a') }}</p>
                                <p class="text-sm text-gray-900 dark:text-gray-400">{{ $class->date_time->format('jS M') }}</p>
                            </div>
                        </div>
                        <div class="mt-1 text-right">
                            <form method="post" action="{{ route('schedule.store') }}">
                                @csrf
                                <x-primary-button class="px-3 py-1">Book</x-primary-button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div>
                        <p>No class have been scheduled at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

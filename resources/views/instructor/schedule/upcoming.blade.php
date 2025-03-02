<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Schedule a Class
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-400 max-w-2xl divide-y">
                    @forelse ($scheduledClasses as $schedule)
                        <div class="py-6">
                            <div class="flex gap-6 justify-between">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-400">{{ $schedule->classType->name }}</p>
                                    <span class="text-slate-600 text-sm">{{ $schedule->classType->minutes }} minutes</span>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-lg font-bold">{{ $schedule->date_time->format('g:i a') }}</p>
                                    <p class="text-sm">{{ $schedule->date_time->format('jS M') }}</p>
                                </div>
                            </div>
                            @can('delete', $class)
                                <div class="mt-1 text-right">
                                    <form method="post" action="{{ route('schedule.destroy', $schedule) }}">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="px-3 py-1">Cancel</x-danger-button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    @empty
                        <div>
                            <p>You don't have any upcoming classes</p>
                            <a class="inline-block mt-6 underline text-sm" href="{{ route('schedule.create') }}">
                                Schedule now
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

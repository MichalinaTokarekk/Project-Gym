<x-app-layout>
    <x-slot name='header'>
        <h2 class="text-x1 font-semibold leading-tight text-center text-5xl" style="color:rgb(119, 57, 39); font-family:cursive">
            <strong>{{__('translation.navigation.trainers')}}</strong>
            </h2>

    </x-slot>

    
    <div class="py-12" style="background-image: url('/storage/tlo.png');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 shadow-xl sm:rounded-lg" style="padding:2cm; background-color: #ded6dc">
                @if (isset($trainer))
                    
                    <livewire:trainers.trainer-form :trainer="$trainer" :editMode="true" />

                @else
                    <livewire:trainers.trainer-form :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

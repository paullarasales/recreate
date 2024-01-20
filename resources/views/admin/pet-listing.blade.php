<x-admin-layout>
    <div class="flex flex-col items-center justify-center h-screen p-6">
        <div class="flex flex-wrap justify-center w-full bg-red-500">
            @if($pets && count($pets) > 0)
                @foreach($pets as $pet)
                   <div class="flex ">
                        @if($pet->photo)
                            <img class="w-full h-32 object-cover" src="{{ asset($pet->photo) }}" alt="{{ $pet->name }} Image">
                            @endif
                        <p class="text-xl font-semibold">{{$pet->name}}</p>
                   </div>
                @endforeach
            @else
                <p class="text-xl font-semibold">
                    No Pets Found. Please add a new Pet to continue.
                </p>
            @endif
        </div>
    </div>
</x-admin-layout>

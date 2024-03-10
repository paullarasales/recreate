<x-user-layout>
    <div class="flex flex-col items-center justify-center h-screen p-6">
        <div class="flex items-center flex-wrap justify-center w-full h-full gap-5">
            @if($pets && count($pets) > 0)
                @foreach($pets as $pet)
                    <div class="flex items-center justify-center flex-col h-60" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                        @if($pet->photo)
                            <img class="w-full h-44 object-cover" src="{{ asset($pet->photo) }}" alt="{{ $pet->name }} Image">
                        @endif
                        <p class="text-xl font-semibold">{{$pet->name}}</p>
                        <p class="text-md font-medium text-green-500">{{ $pet->status}}</p>
                        <form action="{{ route('add-to-cart', ['petId' => $pet->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="pet_id" value="{{ $pet->id }}">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md mt-2">Add to Cart</button>
                        </form>
                        
                    </div>
                @endforeach
                <div class="flex items-center justify-center h-10 w-full mb-56 gap-2">
                    {{ $pets->links() }}
                </div>
            @else
                <p class="text-xl font-semibold">
                    No Pets Found. Please add a new Pet to continue.
                </p>
            @endif
        </div>
    </div>
</x-user-layout>

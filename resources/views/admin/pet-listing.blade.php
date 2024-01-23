<x-admin-layout>
    <div class="flex flex-col items-center justify-center h-screen p-6">
        <div class="flex flex-wrap justify-center w-full h-full gap-5">
            @if($pets && count($pets) > 0)
                @foreach($pets as $pet)
                   <div class="flex items-center justify-center flex-col h-60" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                        @if($pet->photo)
                            <img class="w-full h-44 object-cover" src="{{ asset($pet->photo) }}" alt="{{ $pet->name }} Image">
                            @endif
                        <p class="text-xl font-semibold">{{$pet->name}}</p>
                        <p class="text-md font-medium text-green-500">{{ $pet->status}}</p>
                        <a href="{{ route('pet.delete', ['pet' => $pet->id])}}" onclick="event.preventDefault();
                            document.getElementById('delete-btn{{ $pet->id }}').submit();">
                            <button type="button" class="text-red-500">Delete</button>
                        </a>
                        <form id="delete-btn{{ $pet->id }}" action="{{ route('pet.delete', ['pet' => $pet->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
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

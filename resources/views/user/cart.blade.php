<x-user-layout>
    <h1>This is Cart</h1>
    @if ($cartItems->count() > 0)
        <ul>
            @foreach ($cartItems as $cartItem)
                <li>
                    {{ $cartItem->pet->name }} - Quantity: {{ $cartItem->quantity }}
                    <img src="{{ $cartItem->pet->photo }}" alt="{{ $cartItem->pet->name }} Photo">
                </li>
            @endforeach
        </ul>
    @else
        <p>Your cart is empty.</p>
    @endif
</x-user-layout>

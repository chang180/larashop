<div class="grid grid-cols-4 gap-4 mt-12">
    <div class="col-span-3 p-5 text-white bg-black rounded-lg shadow">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Product</th>
                    <th class="text-left">Color</th>
                    <th class="text-left">Size</th>
                    <th class="text-left">Price</th>
                    <th class="text-left">Qnaitity</th>
                    <th class="text-right">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->variant->size }}</td>
                        <td>{{ $item->variant->color }}</td>
                        <td>{{ $item->price }}</td>
                        <td class="flex items-center">
                            <button wire:click='decrement({{ $item->id }})' @disabled($item->quantity == 1)>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>
                            <div>{{ $item->quantity }}</div>
                            <button wire:click='increment({{ $item->id }})'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </td>
                        <td class="text-right">{{ $item->subtotal }}</td>
                        <td class="pl-2">
                            <button wire:click="delete({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Total</td>
                    <td class="font-medium text-right">{{ $this->cart->total }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div>
        <div class="col-span-1 p-5 text-white bg-black rounded-lg shadow">
            @guest
                <p class="text-center">Please <a href="{{ route('register') }}" class="underline text-lg-light">register</a> or <a href="{{ route('login') }}" class="underline text-lg-light">login</a> to checkout</p>
            @endguest
            @auth
                <x-button wire:click="checkout" class="w-full">Checkout</x-button>
            @endauth
        </div>
    </div>
</div>

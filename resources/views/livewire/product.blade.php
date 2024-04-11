<div class="grid grid-cols-2 gap-10 py-12">
    <div class="space-y-4" x-data="{ image: '/{{ $this->product->image->path }}' }">
        <div class="p-5 bg-black rounded-lg shadow">
            <img :src="image" alt="">
        </div>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($this->product->images as $image)
                <div class="p-2 bg-black rounded shadow">
                    <img src="/{{ $image->path }}" @click=" image = '/{{ $image->path }}' " alt="">
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-white">
        <h1 class="text-3xl font-medium">{{ $this->product->name }}</h1>
        <div class="text-xl text-gray-300">{{ $this->product->price }}</div>

        <div class="mt-4">
            {{ $this->product->description }}
        </div>

        <div class="mt-4 space-y-4">
            <select wire:model="variant"
                class="bg-black block w-full rounded-md border-0 py-1.5 pl-3 prj-10 text-gray-300">
                @foreach ($this->product->variants as $variant)
                    <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            @error('variant')
                <div class="m-2 text-sm text-red-400">{{ $message }}</div>
            @enderror

            <x-button wire:click="addToCart">
                Add to cart
            </x-button>
        </div>
    </div>
</div>

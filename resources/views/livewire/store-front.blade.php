<div class="grid grid-cols-4 gap-4 mt-12 text-white">
    @foreach ($this->product as $product)
        <div class="p-4 bg-black rounded-lg shadow">
            <img src="{{ $product->image->path }}" alt="">
            <h2 class="text-lg font-medium">{{ $product->name }}</h2>
            <span class="text-sm text-gray-300">{{ $product->price }}</span>
        </div>
    @endforeach
</div>

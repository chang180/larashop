<div class="p-5 mt-12 text-white bg-black rounded-lg shadow">
    <table class="w-full">
        <thead>
            <tr>
                <th class="text-left">Product</th>
                <th class="text-left">Qnaitity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->items as $item)
            <tr>
                <td>{{ $item->product->name }} Size: {{ $item->variant->size }} Color: {{ $item->variant->color }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

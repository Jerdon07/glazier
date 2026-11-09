<x-layout>
    <div class="grid grid-cols-3 gap-4">
        <div class="card card-lg bg-base-100 shadow-sm">
            <div class="card-body">
                Total Users in the app
                
                <div class="card-title text-3xl">
                    {{ $users_count }}
                </div>
            </div>
        </div>

        <div class="card card-lg bg-base-100 shadow-sm">
            <div class="card-body">
                Total Products in the app
                
                <div class="card-title text-3xl">
                    {{ $products_count }}
                </div>
            </div>
        </div>

        <div class="card card-lg bg-base-100 shadow-sm">
            <div class="card-body">
                Total Ingredients
                
                <div class="card-title text-3xl">
                    {{ $users_count }}
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto mt-4 rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1 ?>
                @foreach ($latest_products as $product)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <th>{{ $product->name }}</th>
                        <th>{{ $product->price }}</th>
                        <th>@if ($product->is_available)
                            <div class="badge badge-soft badge-accent">
                                Available
                            </div>
                        @else
                            <div class="badge badge-soft badge-warning">
                                Not Available
                            </div>
                        @endif</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
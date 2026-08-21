<div class="modal fade" id="delete-product-{{ $product->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-start">

            <div class="modal-header">
                <h5 class="modal-title">Delete Product</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Product: {{ $product->name }}</p>
                <p>Section: {{ $product->section->name }}</p>
                <p>Price: ${{ $product->price }}</p>
                <p>Description: {{ $product->description }}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>

                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-plus"></i>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



@extends ('layouts.admin')
@section ('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Product</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="code">Code:</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $product->code }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Categorie:</label>
                                <select class="form-control" id="categorie" name="categorie_id">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $product->categorie_id == $cat->id ? 'selected' : '' }}>{{ $cat->categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

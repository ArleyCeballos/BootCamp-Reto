@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="code">Code:</label>
                                <input type="text" class="form-control" id="code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="number" class="form-control" id="stock" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Category:</label>
                                <select class="form-control" id="categorie" name="categorie_id">
                                    @foreach($categories as $category)
                                       
                                            <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                                        
                                      
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

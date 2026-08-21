@extends('layouts.app')

@section('title', 'Minimal Catalog')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="">Products</h2>
            <a href="{{ route('products.create') }}" class="btn btn-success">
                <i class="fa-solid fa-circle-plus"></i>
                New Products
            </a>
        </div>


        <table class="table table-bordered table-striped table-hover mt-3">
            <thead class="bg-secondary">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>SECTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->section->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-secondary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            {{-- delete modal --}}
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-product-{{ $product->id }}">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </button>

                            @include('products.modal.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

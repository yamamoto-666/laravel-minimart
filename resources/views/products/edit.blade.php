@extends('layouts.app')

@section('title', 'Product Edit')

@section('content')

<main class="container">
       
            {{-- edit --}}
            <form action="{{route('product.update', $product->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label small fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name', $product->name)}}" maxlength="50" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label small fw-bold">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control" required>{{old('description', $product->description)}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label small fw-bold">Price</label>
                    <div class="input-group">
                        <div class="input-group-text">$</div>
                        <input type="number" name="price" id="price" class="form-control" value="{{old('price', $product->price)}}" step="0.01" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="section-id" class="form-label">Section</label>

                    <select name="section_id" id="section-id" class="form-select" required>
                        <option value="" hidden>Select Section</option>

                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" @selected(old('section_id', $product->section_id) == $section->id)>
                              {{ $section->name }}
                            </option>
                        @endforeach
                    </select>

                    
                </div>

                <a href="{{route('product.index')}}" class="btn btn-outline-secondary">Cancel</a>

                <button type="submit" name="btn_add" class="btn btn-secondary fw-bold px-5">
                    <i class="fa-solid fa-plus"></i>
                    Save Changes
                </button>
            </form>
</main>
@endsection
@extends('layouts.app')

@section('title', 'New Product')

@section('content')
    <main class="container">

        {{-- Product追加フォーム --}}
        <form action="{{ route('store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label small fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" maxlength="50" required autofocus>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label small fw-bold">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label small fw-bold">Price</label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="section-id" class="form-label">Section</label>

                <select name="section_id" id="section-id" class="form-select" required>
                    <option value="" hidden>Select Section</option>

                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">
                            {{ $section->name }}
                        </option>
                    @endforeach
                </select>

               @if ($sections->isEmpty())
                    <a href="{{route('section.index')}}">
                        Add a new section
                    </a>  
               @endif
            </div>

            <a href="{{ route('product.index') }}" class="btn btn-outline-success">Cancel</a>

            <button type="submit" name="btn_add" class="btn btn-success fw-bold px-5">
                <i class="fa-solid fa-plus"></i>
                Add
            </button>
        </form>
    </main>
@endsection

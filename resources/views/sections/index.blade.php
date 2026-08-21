@extends('layouts.app')

@section('title', 'section')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="fw-bold mb-3">Sections</div>
                <div class="mb-3">
                    <form action="{{ route('section.store') }}" method="post">
                        @csrf
                        <div class="row gx-2">
                            <div class="col">
                                <input type="text" name="name" maxlength="50" placeholder="Add a new section here..."
                                    class="form-control" required autofocus>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="btn_add" class="btn btn-info w-100 fw-bold">
                                    <i class="fa-solid fa-plus"></i>
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-sm align-middle text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{$section->id}}</td>
                                <td>{{$section->name}}</td>
                                <td>
                                    <form action="{{route('section.destroy', $section->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="1" name="btn_delete"
                                            class="btn btn-outline-danger border-0">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

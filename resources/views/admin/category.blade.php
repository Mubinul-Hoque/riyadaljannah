@extends('admin.layouts.app')
@section('title')
    Categories
@endsection

@php
    $page = 'Categories';
@endphp

@section('mainpart')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">All Categories</h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#AddCategoryModal">Add Category</button>            
        </div>
        <div class="card-body">
            <table class="table table-border" id="dataTable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                    @foreach ($categories as $sl=> $category)
                     <tr>
                        <td>{{ ++$sl }}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <div class="d-flex">
                                <button  class="btn btn-primary btn-sm mr2" data-toggle="modal" 
                                    data-target="{{'#Edit'.$category->id.'CategoryModal'}}"><i class="fa fa-edit"></i></button>
                            <form action="{{route('category.destroy', $category->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="delete btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>

                            </form>
                            </div>
                        </td>
                    </tr>

 <!-- Category Edit Modal-->
    <div class="modal fade" id="{{'Edit'.$category->id.'CategoryModal'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$category->name}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> 
            <form action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name}}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{$category->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit" href="login.html">Update Category </button>
                </div>
            </form> 
            </div>
        </div>
    </div>

   
                    @endforeach     
                </tbody>
            </table>
        </div>
    </div>



        <!-- Category Add Modal-->
    <div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description')}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit" href="login.html">Add Category </button>
                </div>
            </form> 
            </div>
        </div>
    </div>


@endsection

@extends('admin.layouts.app')
@section('title')
    Posts
@endsection

@php
    $page = 'Posts';
@endphp

@section('mainpart')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">All Posts</h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#AddPostModal">Add Post</button>            
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
                     
                
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <?php /*
                            <div class="d-flex">
                                <button  class="btn btn-primary btn-sm mr2" data-toggle="modal" 
                                    data-target="{{'#Edit'.$Post->id.'PostModal'}}"><i class="fa fa-edit"></i></button>
                            <form action="{{route('Post.destroy', $Post->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="delete btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>

                            </form>
                            </div>

                            */ ?>
                        </td>
                    </tr>

 <!-- Post Edit Modal-->
<?php /*
    <div class="modal fade" id="{{'Edit'.$Post->id.'PostModal'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$Post->name}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div> 
            <form action="{{route('Post.update', $Post->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Post_name">Post Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$Post->name}}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Post_description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{$Post->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit" href="login.html">Update Post </button>
                </div>
            </form> 
            </div>
        </div>
    </div>
*/ ?>
   
                    
                </tbody>
            </table>
        </div>
    </div>



        <!-- Post Add Modal-->
    <div class="modal fade" id="AddPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="post_name">Post Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Post Category</label>
                        <select  class="form-control">
                            <option selected disabled >Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="post_description">Post Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description')}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                            
                        </span>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label for="post_name">Post Thumbnail</label>
                        <input type="file" class="form-control-file" name="thumbnail">
                    </div>

                    <div class="form-check-label">
                        <label for="status">
                        <input type="checkbox" value="1" name="status" id="status"> Status</label>
                    </div>


                </div>
                
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit" href="login.html">Add Post </button>
                </div>
            </form> 
            </div>
        </div>
    </div>


@endsection

@extends('admin.layout')

@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="d-flex justify-content-between">
                        
                            <h1>product_categories</h1>

                            <div>
                                <a href="{{ route('product_categories.create') }}" class="btn btn-success">New category</a>
                            </div>
                        </div>

                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Count of products</th>
                                                <th>Status</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($product_categories as $cat)
                                                <tr>
                                                    <td>{{ $cat->id }}</td>
                                                    <td><img src="/storage/product_categories/{{ $cat->image }}" width="100"></td>
                                                    <td>{{ $cat->name }}</td>
                                                    <td>{{ $cat->products->count() }}</td>
                                                    @if($cat->status == 1)
                                                        <td class="process">Active</td>
                                                    @else 
                                                        <td class="denied">Deactive</td>
                                                    @endif

                                                    <td class="d-flex">
                                                        <a href="{{ route('product_categories.show', $cat->id) }}" class="btn btn-primary mr-1">Show</a>
                                                        <a href="{{ route('product_categories.edit', $cat->id) }}" class="btn btn-secondary mr-1">Edit</a>

                                                        <form action="{{ route('product_categories.destroy', $cat->id) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
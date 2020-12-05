@extends('admin.layout')

@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="d-flex justify-content-between">
                        
                            <h1>Products</h1>

                            <div>
                                <a href="{{ route('products.create') }}" class="btn btn-success">New product</a>
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
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Weight</th>
                                                <th>Status</th>
                                                <th>Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td><img src="/storage/products/{{ $product->image }}" width="100"></td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category ? $product->category->name : '---' }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->discount_percent }}</td>
                                                    <td>{{ $product->weight }}</td>
                                                    @if($product->status == 1)
                                                        <td class="process">Active</td>
                                                    @else 
                                                        <td class="denied">Deactive</td>
                                                    @endif

                                                    <td class="d-flex">
                                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary mr-1">Show</a>
                                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary mr-1">Edit</a>

                                                        <form action="{{ route('products.destroy', $product->id) }}" onsubmit="return confirm('Are you sure to delete?')" method="POST">
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
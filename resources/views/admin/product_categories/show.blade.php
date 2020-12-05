@extends('admin.layout')

@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="d-flex justify-content-between">
                        
                            <h1>Product info</h1>

                            <div>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">All products</a>
                            </div>
                        </div>



                        <div class="row m-t-30">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body card-block">
                                        
                                        <div>
                                            <table class="table">
                                                <tr>
                                                    <th>ID</th>
                                                    <td>{{ $product->id }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $product->name }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Price</th>
                                                    <td>{{ $product->price }}</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
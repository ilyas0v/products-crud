@extends('admin.layout')

@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="d-flex justify-content-between">
                        
                            <h1>Edit product</h1>

                            <div>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">All products</a>
                            </div>
                        </div>



                        <div class="row m-t-30">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Edit product</b>
                                    </div>



                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $err)
                                                <li>{{ $err }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif



                                    
                                    <div class="card-body card-block">
                                        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            @csrf
                                            @method('PUT')


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category_id" id="" class="form-control">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Product name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="name" value="{{ $product->name }}" placeholder="" class="form-control">
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Short description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="short_description" class="form-control">{{ $product->short_description }}</textarea>
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Text</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="text" class="form-control" style="height:200px;">{{ $product->text }}</textarea>
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Previous price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="previous_price" value="{{ $product->previous_price }}" placeholder="" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="price" value="{{ $product->price }}" placeholder="" class="form-control">
                                                </div>
                                            </div>






                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input type="file" id="text-input" name="image" placeholder="" class="form-control">
                                                </div>

                                                <div class="col-md-3">
                                                    <img src="/storage/products/{{ $product->image }}" height="50px" alt="">
                                                </div>
                                            </div>



                                            



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Weight</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="weight" value="{{ $product->weight }}" placeholder="" class="form-control">
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Shipping days</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="shipping_days" value="{{ $product->shipping_days }}" placeholder="" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Shipping cost</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="shipping_cost" value="{{ $product->shipping_cost }}" placeholder="" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label ">
                                                            <input type="radio" id="inline-radio1" name="status" value="1" @if($product->status == 1) checked @endif class="form-check-input">Active
                                                        </label>
                                                        <label for="inline-radio2" class="form-check-label ">
                                                            <input type="radio" id="inline-radio2" name="status" value="0" @if($product->status == 0) checked @endif class="form-check-input">Deactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>

                                    
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection
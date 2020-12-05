@extends('admin.layout')

@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="d-flex justify-content-between">
                        
                            <h1>New product</h1>

                            <div>
                                <a href="{{ route('product_categories.index') }}" class="btn btn-primary">All product_categories</a>
                            </div>
                        </div>



                        <div class="row m-t-30">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <b>New product</b>
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
                                        <form action="{{ route('product_categories.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            @csrf

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Category name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="name" value="{{ old('name') }}" placeholder="" class="form-control">
                                                    <span style="color:red;">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="text-input" name="image" placeholder="" class="form-control">
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label ">
                                                            <input type="radio" id="inline-radio1" name="status" value="1" checked class="form-check-input">Active
                                                        </label>
                                                        <label for="inline-radio2" class="form-check-label ">
                                                            <input type="radio" id="inline-radio2" name="status" value="0" class="form-check-input">Deactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Ordering</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="text-input" name="ordering" value="{{ old('name') }}" placeholder="" class="form-control">
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
@extends('layouts.backend.master')

@section('title','Tag')

@push('css')
    <style>
        .service-inner-child{
            border: 1px solid gray;
            padding: 5px 15px 3px 15px;
            position: relative;
            margin: 10px 0;
        }
        .service-inner-child a {
            position: absolute;
            top: 0;
            right: 0;
            border-radius: 0;
            border-bottom-left-radius: 4px;
            padding: 0;
            height: 25px;
            width: 25px;
            line-height: 25px;
            margin: 0;
            text-align: center;
            font-size: 10px;
            font-weight: 700;
            z-index: 99999;
        }
    </style>
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-pages icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Create New Service') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('admin.service.index') }}" class="btn-shadow btn btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-arrow-circle-left fa-w-20"></i>
                        </span>
                        {{ __('Back to list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- form start -->
            <form role="form" id="userFrom" method="POST" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Service Info</h5>

                                <div class="form-group">
                                    <label for="">Service Title <small class="text-danger"><strong>*</strong></small></label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" field-attributes="required autofocus" placeholder="Enter title" >
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="editor" placeholder="Description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="">Order Button</label>
                                        <input type="text" name="order" class="form-control @error('order') is-invalid @enderror" field-attributes="required autofocus" placeholder="Enter Fiverr Order Url here" >
                                        @error('order')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Envato Button</label>
                                        <input type="text" name="envato" class="form-control @error('envato') is-invalid @enderror" field-attributes="required autofocus" placeholder="Enter Envato Order Url here" >
                                        @error('envato')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Preview Button </label>
                                        <input type="text" name="preview" class="form-control @error('preview') is-invalid @enderror" field-attributes="required autofocus" placeholder="Enter Preview Url here" >
                                        @error('preview')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="servicecategory_id" class="form-control select @error('servicecategory_id') is-invalid @enderror">
                                        <option value="0" selected disabled>Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('servicecategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select name="servicetag[]" class="form-control select @error('servicetag') is-invalid @enderror" multiple="multiple" data-placeholder="Select an option *" data-allow-clear="true">
                                        <option value="0" disabled>Default Tags </option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('servicetag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Featured Image (Only Image are allowed) <small class="text-danger"><strong>*</strong></small></label>
                                    <input type="file" class="dropify @error('featured_image') is-invalid @enderror" name="featured_image" />
                                    @error('featured_image')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="checkbox" name="status" value="1" class="custom-switch" id="status" />
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="is_child" value="1" class="custom-switch" id="is_child" />
                                        <label for="is_child">Is-child</label>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger"  on-click="resetForm('userFrom')"><i class="fas fa-redo"></i></button>

                                @isset($servicetag)
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-circle-up"></i> Update</button>
                                @else
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create</button>
                                @endisset
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor',
        menubar: false
    });


    $('document').ready(function(){
        var maxField = 20;
        var fieldHTML = '<div class="service-inner-child"><a href="" class="btn btn-danger fa fa-trash remove_button"></a><div class="form-group row align-items-center"><div class="col-md-4"><label for="">Image (Only Image are allowed) <small class="text-danger"><strong>*</strong></small></label><input type="file" class="dropify @error('item_image') is-invalid @enderror" name="item_image[]" />@error('item_image')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-md-4"><label for="">Title <small class="text-danger"><strong>*</strong></small></label><input type="text" name="item_title[]" class="form-control @error('item_title') is-invalid @enderror" field-attributes="required autofocus" placeholder="Enter Name" >@error('item_title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="col-md-4"><label for="">Preview Button <small class="text-danger"><strong>*</strong></small></label><input type="text" name="preview_button[]" class="form-control @error('preview_button') is-invalid @enderror" field-attributes="required autofocus" placeholder="Enter Preview Url here" >@error('preview_button')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div></div>'; //New input field html 
        var x = 1;


        $('#add_field').click(function(e){
            e.preventDefault();
            if(x < maxField){
                x++;
                $('.service-child').append(fieldHTML);
            }
        });

        $('.service-child').on('click', '.remove_button', function(e){
	        e.preventDefault();
	        $(this).parent('div').remove();
	        x--;
	    });

        $('#is_child').change(function () {
            if (this.checked) 
            $('.child-section').show(500);
            else 
            $('.child-section').hide(500);
        });
        
    });
</script>
@endpush
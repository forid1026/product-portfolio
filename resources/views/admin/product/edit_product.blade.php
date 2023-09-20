@extends('admin.admin_dashboard')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
@section('admin')
    <div class="app-main__inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-muted">Update Product</h4>
                            <form class="custom-validation" action="{{ route('update.product') }}" id="form"
                                method="POST" novalidate="" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="{{ $productInfo->id }}">
                                            <input type="text" id="name" name="name" class="form-control"
                                                required="" placeholder="Product Name"
                                                data-parsley-required-message="Product Name is required"
                                                value="{{ $productInfo->name }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <input type="text" id="slug" name="slug" class="form-control"
                                                required="" placeholder="Product Slug"
                                                data-parsley-required-message="Product Slug is required"
                                                value=" {{ $productInfo->slug }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <select name="category_id" id="category_id" class="form-control" required
                                                data-parsley-required-message="Category is required">
                                                <option value="" disabled selected> Select Product Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $productInfo->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <select name="sub_cat_id" id="sub_cat_id" class="form-control" required
                                                data-parsley-required-message="Sub Category is required">
                                                <option value="" disabled selected> Select Product Sub Category
                                                </option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option value="{{ $subCategory->id }}"
                                                        {{ $subCategory->id == $productInfo->sub_cat_id ? 'selected' : '' }}>
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <textarea name="description" id="editor" cols="30" rows="10" required
                                                data-parsley-required-message="Product Details is required">
                                            {{ $productInfo->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="col text-secondary">
                                                <label for="" class="mb-2"><b>Student Image</b></label>
                                                <input type="file" name="image" id="image" class="form-control"
                                                    required data-parsley-required-message="Product Image is required">
                                            </div>
                                            <div class="col-12 mt-3 text-secondary">
                                                <img id="showImage" src=" {{ url('upload/no-image.jpg') }}" alt="Admin"
                                                    width="200px" height="200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $('#form').parsley();
    </script>

    <!-- Image Show -->
    <script>
        $(document).ready(function() {
            // image on load
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);

            });
        });
    </script>

    <!-- get category -->
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#category_id').on('change', function() {
                let categoryId = $(this).val();
                $.ajax({
                    url: '{{ route('get.sub.category') }}?category_id=' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        console.log('data', data);
                        let html = '<option value="">Select Sub Category </option>';
                        $.each(data, function(key, value) {
                            console.log(value);
                            html += '<option value=" ' + value.id + ' "> ' +
                                value.name + '</option>';
                        });
                        $("#sub_cat_id").html(html);
                    }
                });
            });
        });
    </script>
@endsection

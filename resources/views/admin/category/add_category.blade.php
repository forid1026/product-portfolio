@extends('admin.admin_dashboard')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

@section('admin')
    <div class="app-main__inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-muted">Add Category</h4>
                            <form class="custom-validation" action="{{ route('store.category') }}" method="POST"
                                novalidate="" enctype="multipart/form-data" id="form" autocomplete="off">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="text" id="name" name="name" class="form-control"
                                                required="" placeholder="Category Name"
                                                data-parsley-required-message="Category Name is required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="col text-secondary">
                                                <label for="" class="mb-2"><b>Category Image</b></label>
                                                <input type="file" name="category_image" id="image" class="form-control" required
                                                data-parsley-required-message="Category Image is required">
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
                                            Add Category
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
@endsection

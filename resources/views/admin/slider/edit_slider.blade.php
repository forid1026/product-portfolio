@extends('admin.admin_dashboard')
@section('admin')
    <div class="app-main__inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-muted">Update Slide</h4>
                            <form class="custom-validation" action="{{ route('update.slider') }}" method="POST" novalidate=""
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row mb-3">
                                    <input type="hidden" value="{{ $sliderInfo->id }}" name="id">
                                    <div class="col text-secondary">
                                        @error('slider_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <label for="" class="mb-2"><b>Student Image</b></label>
                                        <input type="file" name="slider_image" id="image" class="form-control">
                                    </div>
                                    <div class="col-12 mt-3 text-secondary">
                                        <img id="showImage"
                                            src="{{ !empty($sliderInfo->slider_image) ? url($sliderInfo->slider_image) : url('upload/no-image.jpg') }}"
                                            alt="Admin" width="800px" height="200px">
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Update Slide
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


    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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

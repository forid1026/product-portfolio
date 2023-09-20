@extends('admin.admin_dashboard')
@section('admin')
    <div class="app-main__inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-muted">Update Sub Category</h4>
                            <form class="custom-validation" action="{{ route('update.sub.category') }}" method="POST"
                                novalidate="" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="{{ $subCatInfo->id }}">
                                            <input type="text" id="name" name="name"
                                                value="{{ $subCatInfo->name }}" class="form-control" required=""
                                                placeholder="Category Name"
                                                data-parsley-required-message="Category Name is required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $subCatInfo->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Update Category
                                        </button>
                                        <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
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
@endsection

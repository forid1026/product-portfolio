@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <div class="app-main__inner">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;" class="text-light"><i
                                    class="bx bx-home-alt text-light"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product All</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>

        <!--breadcrumb-->
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Product</h6>
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{ route('add.product') }}">
                    <button class="btn btn-info">Add Product</button>
                </a>
            </h6>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Product Code</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Product Code</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allProduct as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ $product->slug }}
                                        </td>
                                        <td>
                                            {{ $product['category']['name'] }}
                                        </td>
                                        <td>
                                            {{ $product['sub_category']['name'] }}
                                        </td>
                                        <td>
                                            {!! DNS1D::getBarcodeHTML("$product->product_code", 'C128',true) !!}
                                            p - {{$product->product_code}}
                                        </td>
                                        <td>
                                            {!! $product->description !!}
                                        </td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" width="80" alt="">
                                        </td>
                                        <td style="display:flex">
                                            <a title="Edit Product" style="margin-left: 5px;"
                                                href="{{ route('edit.product', $product->id) }}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Delete Category" id="delete" style="margin-left: 5px;"
                                                href="{{ route('delete.product', $product->id) }}" class="btn btn-danger"
                                                title="Delete Product">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>
@endsection

@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <div class="app-main__inner">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Distributor</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;" class="text-light"><i
                                    class="bx bx-home-alt text-light"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Distributor All</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>

        <!--breadcrumb-->
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Distributor</h6>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($allDistributor as $key => $distributor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $distributor->name }}
                                        </td>
                                        <td>
                                            {{ $distributor->facebook_url }}
                                        </td>
                                        <td>
                                            {{ $distributor->phone }}
                                        </td>
                                        <td>
                                            {{ $distributor->province }}
                                        </td>
                                        <td>
                                            {{ $distributor->city }}
                                        </td>
                                        <td>
                                            @if ($distributor->status == '0')
                                                <span class="badge badge-pill rounded bg-danger text-light">Pending</span>
                                            @elseif($distributor->status == '1')
                                                <span class="badge badge-pill rounded bg-success text-light">Approved</span>
                                            @endif
                                        </td>
                                        <td style="display:flex">
                                            @if ($distributor->status == '0')
                                                <a title="Change Distributor Status" id="statusChange"
                                                    style="margin-left: 5px;"
                                                    href="{{ route('status.change.distributor', $distributor->id) }}"
                                                    class="btn btn-info" title="Delete Contact">
                                                    <i class="fas fa-thumbs-up    "></i>
                                                    Change Status
                                                </a>
                                            @endif

                                            <a title="Delete Distributor" id="delete" style="margin-left: 5px;"
                                                href="{{ route('delete.distributor', $distributor->id) }}"
                                                class="btn btn-danger" title="Delete Contact">
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

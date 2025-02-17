@extends('layouts.main')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Activity Logs</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Activity
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body card-dashboard">
                                    <!-- <div class="text-left">
                                        <a class="btn btn-primary" href="{{ route('admin.service.create') }}">
                                            <i class="bx bx-plus"></i>&nbsp; Add New
                                        </a>
                                    </div> -->
                                    <div class="table-responsive">
                                        <table id="table zero-configuration table-extended-chechbox" class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Level</th>
                                                    <th>Message</th>
                                                    <th>Context</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($logs as $key => $value)
                                                     <tr>
                                                        <td>{{$value->level}}</td>
                                                        <td>{{$value->message}}</td>
                                                        <td>{{$value->context}}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                                </span>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{route('admin.service.view', $value->id)}}"><i class="bx bx-detail mr-1" data-icon="users"></i> View</a>
                                                                    <a class="dropdown-item delete-btn" data-id="{{ $value->id }}" href="javascript:void(0);"><i class="bx bx-trash mr-1"></i> delete</a>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <a href="{{route('admin.service.edit', $value->id)}}" class="btn btn-sm btn-icon item-edit" style="margin-top: -10px; padding:0rem;"><i class="bx bxs-edit"></i></a>
                                                                </div>
                                                            </div>
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
                </section>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('commonJS/deleteItem.js') }}"></script>
<script>
    initializeDeleteAction('.delete-btn', '{{ route("admin.service.destroy") }}');
</script>
@endpush
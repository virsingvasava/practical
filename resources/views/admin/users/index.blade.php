@extends('layouts.main')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Users</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">User
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
                                    <div class="text-left">
                                        <a class="btn btn-primary" href="{{ route('admin.user.create') }}">
                                            <i class="bx bx-plus"></i>&nbsp; Add New
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="table zero-configuration table-extended-chechbox" class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Profile | Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($userArray as $key => $value)
                                                     <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-start align-items-center">
                                                                <div class="avatar-wrapper">
                                                                    <div class="avatar me-2">
                                                                        @if($value->profile_picture)
                                                                            <img src="{{ asset($value->profile_picture) }}" alt="profile" class="rounded-circle" style="width:38px; height:38px; object-fit: cover;">
                                                                        @else
                                                                            <span class="avatar-initial rounded-circle bg-label-primary">{{ strtoupper(substr($value->first_name, 0, 1).substr($value->last_name, 0, 1)) }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate">{{ $value->first_name }} {{ $value->last_name }}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{ $value->job_title ?? 'Lorem Title' }}</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{$value->email}}</td>
                                                        <td>{{$value->phone_number}}</td>
                                                        <td>{{$value->status}}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                                </span>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{route('admin.user.view', $value->id)}}"><i class="bx bx-detail mr-1" data-icon="users"></i> View</a>
                                                                    <a class="dropdown-item delete-btn" data-id="{{ $value->id }}" href="javascript:void(0);"><i class="bx bx-trash mr-1"></i> delete</a>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <a href="{{route('admin.user.edit', $value->id)}}" class="btn btn-sm btn-icon item-edit" style="margin-top: -10px; padding:0rem;"><i class="bx bxs-edit"></i></a>
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
    initializeDeleteAction('.delete-btn', '{{ route("admin.user.destroy") }}');
</script>
@endpush
@extends('layouts.main')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Super</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="#">User</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.setting.changePassword', $user->id) }}" class="form form-vertical" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- Current Password -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="current_password">Current Password</label>
                                                    <input type="password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Current Password">
                                                    @error('current_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- New Password -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password">
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- Confirm Password -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm New Password</label>
                                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm New Password">
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1">Update</button>
                                                <button type="reset" class="btn btn-light-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
<script>
    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        resetFields();
    });

    function resetFields() {
        document.querySelectorAll('input[type="text"]').forEach(function(input) {
            input.value = '';  
        });
        document.querySelectorAll('input[type="password"]').forEach(function(input) {
            input.value = '';  
        });
    }
</script>
@endpush

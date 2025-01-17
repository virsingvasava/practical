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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
                            <li class="breadcrumb-item active"><a href="#">Details</a></li>
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
                                <h4 class="card-title">User Profile Details</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- First Name -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="First Name" readonly>
                                                    @error('first_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Last Name -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Last Name" readonly>
                                                    @error('last_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Username -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" placeholder="Username" readonly>
                                                    @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Email -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" readonly>
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Phone Number -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="text" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Phone Number" readonly>
                                                    @error('phone_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Profile Picture -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="profile_picture">Profile Picture</label>
                                                    <input type="file" id="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror mb-1" name="profile_picture" disabled>
                                                    @if($user->profile_picture)
                                                        <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail" style="width: 100px; height: 100px;">
                                                    @else
                                                        <p class="form-control-plaintext">No Profile Picture</p>
                                                    @endif
                                                    @error('profile_picture')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Slug -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $user->slug) }}" placeholder="Slug" readonly>
                                                    @error('slug')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Status -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select id="status" class="form-control" name="status" disabled>
                                                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Created At -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="created_at">Created At</label>
                                                    <input type="text" id="created_at" class="form-control @error('slug') is-invalid @enderror" name="created_at" value="{{ $user->created_at->format('d M Y, h:i A') }}" placeholder="Slug" readonly>
                                                    @error('created_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Updated At -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updated_at">Last Updated</label>
                                                    <input type="text" id="updated_at" class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" value="{{ $user->updated_at->format('d M Y, h:i A') }}" placeholder="Slug" readonly>
                                                    @error('updated_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Submit Buttons -->
                                            <div class="col-12 d-flex justify-content-end">
                                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary mr-1">BACK</a>
                                            </div>
                                        </div>
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
@extends('layouts.main')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Services</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></li>
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
                                <h4 class="card-title">Service Details</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- Service Name -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Service Name</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}" placeholder="name" readonly>
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Description -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $service->description) }}" placeholder="Description" readonly>
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Slug -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $service->slug) }}" placeholder="Slug" readonly>
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
                                                        <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Created At -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="created_at">Created At</label>
                                                    <input type="text" id="created_at" class="form-control @error('slug') is-invalid @enderror" name="created_at" value="{{ $service->created_at->format('d M Y, h:i A') }}" placeholder="Slug" readonly>
                                                    @error('created_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Updated At -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updated_at">Last Updated</label>
                                                    <input type="text" id="updated_at" class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" value="{{ $service->updated_at->format('d M Y, h:i A') }}" placeholder="Slug" readonly>
                                                    @error('updated_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Submit Buttons -->
                                            <div class="col-12 d-flex justify-content-end">
                                                <a href="{{ route('admin.service.index') }}" class="btn btn-primary mr-1">BACK</a>
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
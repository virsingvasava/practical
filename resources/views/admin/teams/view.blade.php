@extends('layouts.main')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Tournament</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Team</a></li>
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
                                <h4 class="card-title">Team Details</h4>
                            </div>
                            <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <!-- Team Name -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $team->name) }}" placeholder="name" readonly>
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            
                                           <!-- Team Type -->
                                           <div class="col-12">
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <input type="text" id="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type', $team->type) }}" placeholder="type" readonly>
                                                    @error('type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <!-- Team Status -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <input type="text" id="status" class="form-control @error('status') is-invalid @enderror" name="name" value="{{ old('status', $team->status) }}" placeholder="status" readonly>
                                                    @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            

                                            <!-- Created At -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="created_at">Created At</label>
                                                    <input type="text" id="created_at" class="form-control @error('slug') is-invalid @enderror" name="created_at" value="{{ $team->created_at->format('d M Y, h:i A') }}" placeholder="Slug" readonly>
                                                    @error('created_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Updated At -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="updated_at">Last Updated</label>
                                                    <input type="text" id="updated_at" class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" value="{{ $team->updated_at->format('d M Y, h:i A') }}" placeholder="Slug" readonly>
                                                    @error('updated_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Submit Buttons -->
                                            <div class="col-12 d-flex justify-content-end">
                                                <a href="{{ route('admin.team.index') }}" class="btn btn-primary mr-1">BACK</a>
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
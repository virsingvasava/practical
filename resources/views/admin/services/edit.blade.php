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
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Edit</a>
                                </li>
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
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.service.update', $service->id) }}" class="form form-vertical" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}" placeholder="Name">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $service->description) }}" placeholder="Description">
                                                        @error('description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $service->slug) }}" placeholder="Slug" readonly>
                                                        @error('slug')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select id="status" class="form-control" name="status">
                                                            <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                        </select>
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
    document.getElementById('name').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });

    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        resetFields();
    });

    function resetFields() {
        document.querySelectorAll('input[type="text"]').forEach(function(input) {
            input.value = '';  
        });
        var statusSelect = document.querySelector('select[name="status"]');
        if (statusSelect) {
            statusSelect.value = 'active'; 
        }
    }
</script>
@endpush

@extends('layouts.main')
@section('content')
 <!-- BEGIN: Content-->
 <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Tournament</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Teams</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Add 8 Teams</a>
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
                                    <h4 class="card-title">Tournament Bracket ( Add 8 Teams )</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.team.storeStep1') }}" class="form form-vertical" method="post">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_0">Team 1</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.0') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.0')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_1">Team 2</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.1') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.1')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_2">Team 3</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.2') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.2')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_3">Team 4</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.3') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.3')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_4">Team 5</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.4') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.4')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_5">Team 6</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.5') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.5')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_6">Team 7</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.6') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.6')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="teams_7">Team 8</label>
                                                        <input type="text" name="teams[]" class="form-control @error('teams.7') is-invalid @enderror" placeholder="Enter Team Name">

                                                        @error('teams.7')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-1">Next</button>
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
<script src="{{ asset('commonJS/teamCreateJs.js') }}"></script>
@endpush

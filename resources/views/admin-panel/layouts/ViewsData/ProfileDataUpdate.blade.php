@extends('admin-panel/layouts/addData/Main')

@section('Content')


<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Edit Profile</h2>
            <a href="{{ url('/viewProfileData') }}">View Data</a>
        </div>
        <div>
            <form id="dataForm" action="{{ url('UpdateProfileData/'.$Profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="image" class="form-label">Upload Profile Image</label>
                        <input class="form-control" id="image" type="file" name="image" accept="image/*">
                        <span class="FormAuthentication">@error("image") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label">username</label>
                        <input name="username" class="form-control" id="username" type="text" value="{{ $Profile->username }}">
                        <span class="FormAuthentication">@error("username") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" class="form-control" id="email" type="text" value="{{ $Profile->email }}">
                        <span class="FormAuthentication">@error("email") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" class="form-control" id="password" type="password" required>
                        <span class="FormAuthentication">@error("password") {{ $message }} @enderror</span>
                    </div>

                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="Update Profile">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

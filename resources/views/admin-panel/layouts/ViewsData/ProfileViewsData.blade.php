@extends('admin-panel/layouts/addData/Main')

@section('Content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Recent Customers</title>

</head>
<body>
    <div class="container-fluid details" id="Home">
        <div class="recentCustomers">
            <div class="cardHeader d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-weight-bold section-title">Profile Information</h2>
            </div>
            <div class="row">
                @foreach ($Profile as $profile)
                <div class="customer-card">
                    @if($profile->image)
                        <img src="{{ Storage::url($profile->image) }}" alt="Profile Image" class="customer-img">
                    @else
                        <img src="https://via.placeholder.com/90" alt="Profile Image" class="customer-img">
                    @endif

                    <div class="customer-details">
                        <p><i class="fas fa-id-badge"></i> <strong>ID:</strong> <span class="badge badge-info">{{ $profile->id }}</span></p>
                        <p><strong>UserName:</strong> {{ $profile->username }}</p>
                        <p><strong>Email:</strong> {{ $profile->email }}</p>
                        <p><strong>Password:</strong> <em>(hidden for security)</em></p>
                    </div>
                    <div class="customer-actions">
                        <a href="{{ url('UpdateProfileData/'.$profile->id) }}" class="btn btn-warning" title="Edit Customer"><i class="fa fa-pencil-alt"></i> Edit</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @if(session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
        });
    </script>
    @endif
</body>

</html>
@endsection

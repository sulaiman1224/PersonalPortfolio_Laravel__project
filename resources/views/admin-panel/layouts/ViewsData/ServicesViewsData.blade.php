@extends('admin-panel/layouts/addData/Main')

@section('Content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Services</title>

</head>

<body>

    <div class="container-fluid details" id="Home">
        <!-- About Data Section -->
        <div class="recentCustomers">
            <div class="cardHeader d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-weight-bold section-title">Service Information</h2>
                <a href="{{ route('Admin.Services.AddData') }}" class="btn btn-custom"><i class="fa fa-list"></i> Add data</a>
            </div>

            <div class="row">
                @foreach ($Services as $service)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card service-card">
                        <div class="card-header">
                            {{ $service->name }}
                        </div>
                        <div class="card-body">
                            <p>
                                <strong>ID:</strong>
                                <span class="badge badge-info">{{ $service->id }}</span>
                            </p>
                            <div class="service-description">
                                <strong>Description:</strong>
                                {{ $service->description }}
                            </div>
                            <div class="button-container">
                                <a href="{{ url('editServicesData/'.$service->id) }}" class="btn btn-outline-primary btn-sm edit-btn" title="Edit Customer"><i class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="{{ url('deleteServicesData/'.$service->id) }}" class="btn btn-outline-danger btn-sm delete-btn" title="Delete Customer"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                        </div>
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

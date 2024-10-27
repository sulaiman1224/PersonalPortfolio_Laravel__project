@extends('admin-panel/layouts/addData/Main')

@section('Content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Services</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    
</head>

<body>

    <div class="container-fluid details" id="Home">
        <!-- About Data Section -->
        <div class="recentCustomers">
            <div class="cardHeader d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-weight-bold section-title">Portfolio Information</h2>
                <a href="{{ route('Admin.Portfolio.AddData') }}" class="btn btn-custom"><i class="fa fa-briefcase"></i> Add data</a>
            </div>
            <div class="row">
                @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card service-card">
                        <div class="card-header">
                            {{ $portfolio->language_name }}
                        </div>
                        <img src="{{ Storage::url($portfolio->img) }}" alt="{{ $portfolio->language_name }}" class="service-image img-fluid">
                        <div class="card-body">
                            <p><strong>ID:</strong> <span class="badge badge-info">{{ $portfolio->id }}</span></p>
                            <div class="service-description">
                                <strong>Description:</strong>
                                {{ $portfolio->description }}
                            </div>
                            <div class="button-container">
                                <a href="{{ url('editPortfolioData/'.$portfolio->id) }}" class="btn btn-outline-primary btn-sm edit-btn" title="Edit Service">
                                    <i class="fa fa-pencil-alt"></i> Edit
                                </a>
                                <a href="{{ url('deletePortfolioData/'.$portfolio->id) }}" class="btn btn-outline-danger btn-sm delete-btn" title="Delete Service">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
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

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        @if(session('success'))
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
        });
        @endif
    </script>

</body>

</html>
@endsection

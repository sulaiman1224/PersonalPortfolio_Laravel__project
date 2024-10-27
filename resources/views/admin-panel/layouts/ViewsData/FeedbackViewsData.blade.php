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
                <h2 class="font-weight-bold section-title">Feedback Information</h2>

            </div>
            <div class="row">
                @foreach ($feedback as $fb)
                <div class="col-lg-12 mb-4">
                    <!-- Feedback Data in Card Format -->
                    <div class="feedback-card">
                        <div class="card-header">
                            {{ $fb->name }}
                            <span class="badge-status @if($fb->status == 'Active') badge-success @elseif($fb->status == 'Pending') badge-warning @else badge-danger @endif">
                                {{ $fb->status }}
                            </span>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> <a href="mailto:{{ $fb->email }}" class="email-link">{{ $fb->email }}</a></p>
                            <p><strong>Subject:</strong> {{ $fb->subject }}</p>
                            <p><strong>Message:</strong> {{ $fb->message }}</p>
                            <div>
                                <a href="{{ url('editfeedbackData/'.$fb->id) }}" class="action-btn btn-update" data-toggle="tooltip" data-placement="top" title="Update Feedback">
                                    <i class="fas fa-pencil-alt"></i> Update
                                </a>
                                <a href="{{ url('deletefeedbackData/'.$fb->id) }}" class="action-btn btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Feedback">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
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

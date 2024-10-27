@extends('admin-panel/layouts/addData/Main')

@section('Content')


<!-- Container for status update form -->
<div class="container" id="Home">
    <div class="recentCustomers">
        <div>
            <form id="dataForm" action="{{ url('UpdatefeedbackData/'.$feedback->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Not Seen" {{ $feedback->status == 'Not Seen' ? 'selected' : '' }}>Not Seen</option>
                            <option value="Seen" {{ $feedback->status == 'Seen' ? 'selected' : '' }}>Seen</option>
                        </select>
                    </div>
                </div>
                <!-- Submit button with advanced styling -->
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="Update Status" name="submit">
                    </div>
                </div>
            </form>

            <!-- Success message -->
            @if(session('success'))
            <div class="form-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Error message -->
            @if(session('error'))
            <div class="form-error">
                {{ session('error') }}
            </div>
            @endif
        </div>

        <!-- Footer Section -->
    </div>
</div>

@endsection

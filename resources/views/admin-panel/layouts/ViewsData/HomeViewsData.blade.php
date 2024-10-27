@extends('admin-panel/layouts/addData/Main')

@section('Content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Views data</title>
  


</head>

<body>
    <div class="container-fluid details" id="Home">
        <div class="recentCustomers">
            <div class="cardHeader d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-weight-bold">Home</h2>
                <a href="{{ url('/Admin/Home/AddData') }}" class="btn btn-custom"><i class="fas fa-home"></i> Add Data</a>
            </div>

            @foreach ($AdminHomes as $Home)
            <div class="customer-card">
                <div class="d-flex align-items-center">
                    @if($Home->ProfileImage)
                        <img src="{{ Storage::url($Home->ProfileImage) }}" alt="Profile Image" class="home-img">
                    @else
                        <img src="https://via.placeholder.com/90" alt="Profile Image" class="home-img">
                    @endif

                    <div class="home-details">
                        <p><i class="icon fas fa-id-badge"></i> <strong>ID:</strong> <span class="badge badge-info">{{ $Home->id }}</span></p>
                        <p><strong>Name:</strong> {{ $Home->Name }}</p>
                        <p><strong>Professions:</strong>
                            <span class="badge badge-profession badge-profession-1">{{ $Home->Profession_1 }}</span>
                            <span class="badge badge-profession badge-profession-2">{{ $Home->Profession_2 }}</span>
                            <span class="badge badge-profession badge-profession-3">{{ $Home->Profession_3 }}</span>
                        </p>
                        <p><strong>Description:</strong> {{ Str::limit($Home->Descreption, 50) }} <span class="description-more" data-toggle="modal" data-target="#descriptionModal{{$Home->id}}">Read more</span></p>

                        @if($Home->Cv)
                            <p><a href="{{ Storage::url($Home->Cv) }}" class="cv-link" target="_blank"><i class="fas fa-file-pdf"></i> Download CV</a></p>
                        @endif
                    </div>
                </div>

                <div class="home-actions">
                    <a href="{{ url('UpdateHomeData/'.$Home->id) }}" class="btn btn-warning" title="Edit Customer"><i class="fa fa-pencil-alt"></i> Edit</a>
                    <a href="{{ url('delete/'.$Home->id) }}" class="btn btn-danger" title="Delete Customer"><i class="fa fa-trash"></i> Delete</a>
                </div>
            </div>

            <div class="modal fade" id="descriptionModal{{$Home->id}}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{$Home->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="descriptionModalLabel{{$Home->id}}">Full Description for {{ $Home->Name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $Home->Descreption }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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

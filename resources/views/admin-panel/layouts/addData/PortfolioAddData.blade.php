@extends('admin-panel/layouts/addData/Main')

@section('Content')

<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Portfolio</h2>
            <a href="{{ url('/Admin/Portfolio/ViewsData') }}">View Data</a>
        </div>
        <div>
            <form id="dataForm" action="{{ url('StorePortfolioData') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="img" class="form-label">Upload project Image</label>
                        <input class="form-control" id="img" type="file" name="img" accept="image/*" />
                        <span class="FormAuthentication">@error("img") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="language_name" class="form-label">language Name</label>
                        <input name="language_name" class="form-control" id="language_name" type="text" placeholder="Php" />
                        <span class="FormAuthentication">@error("language_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="url" class="form-label">url</label>
                        <input name="url" class="form-control" id="url" type="text" placeholder="http/vaccination.com" />
                        <span class="FormAuthentication">@error("url") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="descreption" class="form-label">Description</label>
                        <textarea id="descreption" class="form-control" placeholder="description" name="description"></textarea>
                        <span class="FormAuthentication">@error("descreption") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="Add Data portfolio" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

document.getElementById('dataForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);
    let emptyFields = [];

    this.querySelectorAll('input, textarea').forEach(input => {
        if (!input.value) {
            emptyFields.push(input.previousElementSibling.innerText);
        }
    });

    if (emptyFields.length > 0) {
        Swal.fire({
            title: "Empty Fields!",
            text: "Please fill in the following fields: " + emptyFields.join(', '),
            icon: "warning"
        });
        return;
    }

    const profileImageFile = document.getElementById('img').files[0];
    if (profileImageFile && !['image/jpeg', 'image/png', 'image/jpg', 'image/gif'].includes(profileImageFile.type)) {
        Swal.fire({
            title: "Invalid File Type!",
            text: "Profile Image must be an image file (jpeg, png, jpg, gif).",
            icon: "error"
        });
        return;
    }

    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        return Promise.reject(response);
    })
    .then(data => {
        Swal.fire({
            title: "Success!",
            text: data.message,
            icon: "success"
        }).then(() => {
            // window.location.href = '/Admin';
        });
    })
    .catch(err => {
        if (err instanceof Response) {
            err.json().then(errors => {
                const errorMessage = errors.message || Object.values(errors.errors || {}).flat().join(', ');
                Swal.fire({
                    title: "Error!",
                    text: errorMessage,
                    icon: "error"
                });
            }).catch(() => {
                Swal.fire({
                    title: "Error!",
                    text: "An unexpected error occurred while parsing the error response.",
                    icon: "error"
                });
            });
        } else {
            Swal.fire({
                title: "Error!",
                text: "An unexpected error occurred.",
                icon: "error"
            });
        }
    });
});

</script>

@endsection

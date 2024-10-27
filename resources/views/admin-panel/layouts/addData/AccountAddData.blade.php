@extends('admin-panel/layouts/addData/Main')

@section('Content')

<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Accounts</h2>
            <a href="{{ url('/Admin/Accounts/ViewsData') }}">View Data</a>
        </div>

            <form id="dataForm" action="{{ url('StoreAccountData') }}" method="POST" >
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="url" class="form-label">url</label>
                        <input name="url" class="form-control" id="url" type="url" placeholder="Dynamic Web Development" />
                        <span class="FormAuthentication">@error("url") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="icon_first_name" class="form-label">first icon Name</label>
                        <input name="icon_first_name" class="form-control" id="icon_first_name" type="text" placeholder="Fab" />
                        <span class="FormAuthentication">@error("icon_first_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="icon_second_name" class="form-label">second icon Name</label>
                        <input name="icon_second_name" class="form-control" id="icon_second_name" type="text" placeholder="Fa-facebook" />
                        <span class="FormAuthentication">@error("icon_second_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">application Name</label>
                        <input name="name" class="form-control" id="name" type="text" placeholder="facebook" />
                        <span class="FormAuthentication">@error("name") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="Add Data Accounts" name="submit">
                    </div>
                </div>
            </form>

    </div>
</div>

<!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('dataForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);

        // Check for empty fields
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



        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                return response.json(); // Parse JSON response
            }
            return Promise.reject(response); // Handle error responses
        })
        .then(data => {
            Swal.fire({
                title: "Success!",
                text: data.message,
                icon: "success"
            }).then(() => {
                // window.location.href = '/Admin'; // Redirect on success
            });
        })
        .catch(err => {
            err.json().then(errors => {
                Swal.fire({
                    title: "Error!",
                    text: errors.message || Object.values(errors).join(', '),
                    icon: "error"
                });
            });
        });
    });
</script>

@endsection

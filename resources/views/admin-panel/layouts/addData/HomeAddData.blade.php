@extends('admin-panel/layouts/addData/Main')

@section('Content')

<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Home</h2>
            <a href="{{ url('/Admin/Home') }}">View Data</a>
        </div>
        <div>
            <form id="dataForm" action="{{ url('StoreHomeData') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="Name" class="form-label">Enter Name</label>
                        <input name="Name" class="form-control" id="Name" type="text" placeholder="Sulaiman" />
                        <span class="FormAuthentication">@error("Name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="F_letter" class="form-label">Name First Letter</label>
                        <input name="F_letter" class="form-control" id="F_letter" type="text" placeholder="S" />
                        <span class="FormAuthentication">@error("F_letter") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Skip_F_letter" class="form-label">Skip First Letter</label>
                        <input name="Skip_F_letter" class="form-control" id="Skip_F_letter" type="text" placeholder="ulaiman" />
                        <span class="FormAuthentication">@error("Skip_F_letter") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Profession_1" class="form-label">Profession 1</label>
                        <input name="Profession_1" class="form-control" id="Profession_1" type="text" placeholder="Frontend Developer" />
                        <span class="FormAuthentication">@error("Profession_1") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Profession_2" class="form-label">Profession 2</label>
                        <input name="Profession_2" class="form-control" id="Profession_2" type="text" placeholder="Backend Developer" />
                        <span class="FormAuthentication">@error("Profession_2") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Profession_3" class="form-label">Profession 3</label>
                        <input name="Profession_3" class="form-control" id="Profession_3" type="text" placeholder="Full Stack Developer" />
                        <span class="FormAuthentication">@error("Profession_3") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="Descreption" class="form-label">Page Description</label>
                        <textarea id="Descreption" class="form-control" placeholder="Enter page description" name="Descreption"></textarea>
                        <span class="FormAuthentication">@error("Descreption") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="Cv" class="form-label">Upload CV</label>
                        <input class="form-control" id="Cv" type="file" name="Cv" accept="application/pdf" />
                        <span class="FormAuthentication">@error("Cv") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="ProfileImage" class="form-label">Upload Profile Image</label>
                        <input class="form-control" id="ProfileImage" type="file" name="ProfileImage" accept="image/*" />
                        <span class="FormAuthentication">@error("ProfileImage") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="Add Data Home" name="submit">
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

        // Validate file types
        const cvFile = document.getElementById('Cv').files[0];
        const profileImageFile = document.getElementById('ProfileImage').files[0];

        if (cvFile && cvFile.type !== 'application/pdf') {
            Swal.fire({
                title: "Invalid File Type!",
                text: "CV must be a PDF file.",
                icon: "error"
            });
            return;
        }

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
                window.location.href = '/Admin/Home/AddData';
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

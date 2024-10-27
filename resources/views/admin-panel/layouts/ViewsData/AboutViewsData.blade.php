@extends('admin-panel/layouts/addData/Main')

@section('Content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About views data</title>

    </head>

    <body>
        <div class="container-fluid details" id="Home">
            <!-- About Data Section -->
            <div class="recentCustomers">
                <div class="cardHeader d-flex justify-content-between align-items-center mb-4">
                    <h2 class="font-weight-bold section-title">About Information</h2>
                    <a href="{{ route('Admin.About.AddData') }}" class="btn btn-custom"><i class="fa fa-user"></i> Add data</a>
                </div>

                <!-- Search Input -->
                <input type="text" id="searchInput" class="form-control mb-4" placeholder="Search languages or skills..."
                    onkeyup="filterFunction()">

                @foreach ($About as $about)
                    <!-- Summary Section -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Summary</h5>
                            <p class="card-text"><strong>Name:</strong> {{ $about->name }}</p>
                            <p class="card-text"><strong>Profession:</strong> {{ $about->profession }}</p>
                            <p class="card-text"><strong>Age:</strong> {{ $about->age }}</p>
                            <p class="card-text"><strong>Email:</strong> <a href="mailto:{{ $about->email }}"
                            class="text-link">{{ $about->email }}</a></p>
                            <p class="card-text"><strong>Website:</strong> <a href="{{ $about->website }}"
                             class="text-link">{{ $about->website }}</a></p>
                        </div>
                    </div>

                    <!-- Profession Section -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user-tie"></i> Profession
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6"><strong>Profession:</strong> {{ $about->profession }}</div>
                                <div class="col-md-6"><strong>Profession Description:</strong>
                                    <span class="read-more" data-toggle="modal"
                                        data-target="#professionModal{{ $about->id }}">Read More</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education Section with Toggle -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-graduation-cap"></i> Education
                        </div>
                        <div class="card-body">
                            <button class="toggle-button" id="toggleEducation{{ $about->id }}"
                                onclick="toggleEducationDetails({{ $about->id }})">Show Education Details</button>
                            <div id="educationDetails{{ $about->id }}" style="display:none;">
                                <div class="education-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bold">{{ $about->first_education_title }}</h6>
                                        <span class="badge badge-info">{{ $about->first_education_year }}</span>
                                    </div>
                                    <p class="education-description">{{ $about->first_education_description }}</p>
                                </div>

                                <div class="education-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bold">{{ $about->second_education_title }}</h6>
                                        <span class="badge badge-info">{{ $about->second_education_year }}</span>
                                    </div>
                                    <p class="education-description">{{ $about->second_education_description }}</p>
                                </div>

                                <div class="education-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="font-weight-bold">{{ $about->third_education_title }}</h6>
                                        <span class="badge badge-info">{{ $about->third_education_year }}</span>
                                    </div>
                                    <p class="education-description">{{ $about->third_education_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Languages Section (With pcts and Tooltips) -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-language"></i> Languages
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong><i class="fas fa-globe"></i> {{ $about->first_language_name }}:</strong>
                                    <p>{{ $about->first_language_description }}</p>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $about->first_language_pct }};"
                                            data-toggle="tooltip" title="{{ $about->first_language_pct }} proficiency">
                                            {{ $about->first_language_pct }}</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <strong><i class="fas fa-globe"></i> {{ $about->second_language_name }}:</strong>
                                    <p>{{ $about->second_language_description }}</p>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $about->second_language_pct }};"
                                            data-toggle="tooltip" title="{{ $about->second_language_pct }} proficiency">
                                            {{ $about->second_language_pct }}</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <strong><i class="fas fa-globe"></i> {{ $about->third_language_name }}:</strong>
                                    <p>{{ $about->third_language_description }}</p>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $about->third_language_pct }};"
                                            data-toggle="tooltip" title="{{ $about->third_language_pct }} proficiency">
                                            {{ $about->third_language_pct }}</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <strong><i class="fas fa-globe"></i> {{ $about->fourth_language_name }}:</strong>
                                    <p>{{ $about->fourth_language_description }}</p>
                                    <div class="progress">
                                        <div class="progress-bar" style="width:{{ $about->fourth_language_pct }};"
                                            data-toggle="tooltip" title="{{ $about->fourth_language_pct }} proficiency">
                                            {{ $about->fourth_language_pct }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Section with Toggle -->
                    <!-- Skills Card HTML -->
                    <div class="card skill-card">
                        <div class="card-header skill-card-header">
                            <i class="fas fa-laptop-code"></i> Skills
                        </div>
                        <div class="card-body skill-card-body">
                            <button class="toggle-button" id="toggleSkills{{ $about->id }}"
                                onclick="toggleSkillsDetails({{ $about->id }})">
                                Show Skills Details
                            </button>
                            <div id="skillsDetails{{ $about->id }}" class="skills-details" style="display:none;">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong>{{ $about->skill_1_name }}:</strong> {{ $about->skill_1_description }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>{{ $about->skill_2_name }}:</strong> {{ $about->skill_2_description }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>{{ $about->skill_3_name }}:</strong> {{ $about->skill_3_description }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>{{ $about->skill_4_name }}:</strong> {{ $about->skill_4_description }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>{{ $about->skill_5_name }}:</strong> {{ $about->skill_5_description }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="customer-actions">
                        <a href="{{ url('editAboutData/' . $about->id) }}" class="btn btn-warning"
                            title="Edit Customer"><i class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="{{ url('deleteAboutData/' . $about->id) }}" class="btn btn-danger"
                            title="Delete Customer"><i class="fa fa-trash"></i> Delete</a>
                    </div>

                    <!-- JavaScript for Toggle Animation -->
                    <script>
                        function toggleSkillsDetails(id) {
                            const details = document.getElementById('skillsDetails' + id);

                            if (details.style.display === 'none') {
                                details.style.display = 'block';
                                details.style.opacity = '0'; // Start with opacity 0
                                let opacity = 0; // Initial opacity
                                const fadeIn = setInterval(() => {
                                    if (opacity < 1) {
                                        opacity += 0.1; // Increase opacity
                                        details.style.opacity = opacity;
                                    } else {
                                        clearInterval(fadeIn); // Stop when fully opaque
                                    }
                                }, 30);
                            } else {
                                details.style.opacity = '1'; // Set full opacity for fade out
                                let opacity = 1; // Start from full opacity
                                const fadeOut = setInterval(() => {
                                    if (opacity > 0) {
                                        opacity -= 0.1; // Decrease opacity
                                        details.style.opacity = opacity;
                                    } else {
                                        details.style.display = 'none'; // Hide element after fade out
                                        clearInterval(fadeOut); // Stop when fully transparent
                                    }
                                }, 30);
                            }
                        }
                    </script>


                    <!-- Profession Modal -->
                    <div class="modal fade" id="professionModal{{ $about->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="professionModalLabel{{ $about->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="professionModalLabel{{ $about->id }}">Profession
                                        Description</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $about->profession_description }}</p>
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

        <!-- jQuery, Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @if (session('success'))
            <script>
                swal({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success",
                });
            </script>
        @endif
        <!-- Tooltip Initialization -->
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            function toggleEducationDetails(id) {
                var details = document.getElementById('educationDetails' + id);
                var button = document.getElementById('toggleEducation' + id);
                if (details.style.display === "none") {
                    details.style.display = "block";
                    button.textContent = "Hide Education Details";
                } else {
                    details.style.display = "none";
                    button.textContent = "Show Education Details";
                }
            }

            function toggleSkillsDetails(id) {
                var details = document.getElementById('skillsDetails' + id);
                var button = document.getElementById('toggleSkills' + id);
                if (details.style.display === "none") {
                    details.style.display = "block";
                    button.textContent = "Hide Skills Details";
                } else {
                    details.style.display = "none";
                    button.textContent = "Show Skills Details";
                }
            }

            function toggleDarkMode() {
                document.body.classList.toggle('dark-mode');
            }

            function filterFunction() {
                const input = document.getElementById('searchInput').value.toLowerCase();
                const educationItems = document.querySelectorAll('.education-item');

                educationItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    item.style.display = text.includes(input) ? "" : "none";
                });
            }
        </script>
    </body>

    </html>
@endsection

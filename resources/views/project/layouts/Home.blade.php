@extends('project/layouts/main')
@section('Home')
    {{-- Home section start --}}
    <section class="home active section" id="home">
        <div class="container">
            @foreach ($AdminHomes as $Home)
                <div class="row">

                    <div class="home-info padd-15">
                        <h3 class="hello">
                            Hello, my name is <span class="name">{{ $Home->Name }}</span>
                        </h3>
                        <h3 class="my-profession">
                            I, m a <span class="typing">Frontend Developer</span>
                        </h3>
                        <p>
                            {{ $Home->Descreption }}
                        </p>
                        <a href="{{ asset('storage/profile_pdfs/' . basename($Home->Cv)) }}" class="btn"
                            download="">Download CV</a>
                    </div>

                    <div class="home-img ">
                       <div class="image">
                        <img src="{{ asset('storage/profile_images/' . basename($Home->ProfileImage)) }}" alt="profile_image" />
                       </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Pass PHP array to JavaScript
                        var strings = <?php echo json_encode([$Home->Profession_1, $Home->Profession_2, $Home->Profession_3]); ?>;

                        var typed = new Typed('.typing', {
                            strings: strings,
                            typeSpeed: 100,
                            backSpeed: 60,
                            loop: true
                        });
                    });
                </script>
            @endforeach
        </div>
    </section>
    {{-- - Home section end --}}
@endsection
@section('About')
    {{-- about section start --}}
    <section class="about section" id="about">
        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>About Me</h2>
                </div>
            </div>
            @foreach ($About as $about)
                <div class="row">
                    <div class="about-content padd-15">
                        <div class="row">
                            <div class="about-text padd-15">
                                <h3>I'm {{ $about->name }} and <span>{{ $about->profession }}</span></h3>
                                <p>{{ $about->profession_description }}</p>
                                <h3>My journey</h3>
                                <p>{{ $about->journey }}</p>
                                <h3>What i Do</h3>
                                <ul>
                                    <li>
                                        <strong>{{ $about->skill_1_name }}:</strong>
                                        {{ $about->skill_1_description }}
                                    </li>
                                    <li>
                                        <strong>{{ $about->skill_2_name }}:</strong>
                                        {{ $about->skill_2_description }}

                                    </li>
                                    <li>
                                        <strong>{{ $about->skill_3_name }}:</strong>
                                        {{ $about->skill_3_description }}
                                    </li>
                                    <li>
                                        <strong>{{ $about->skill_4_name }}:</strong>
                                        {{ $about->skill_4_description }}
                                    </li>
                                    <li>
                                        <strong>{{ $about->skill_5_name }}:</strong>
                                        {{ $about->skill_5_description }}
                                    </li>
                                </ul>
                                <h3>My Approch</h3>
                                <p>{{ $about->my_approach }}</p>

                                <h3>Let's Connect</h3>
                                <p>{{ $about->lets_connect }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="personal-info padd-15">
                                <div class="row">
                                    <div class="info-item padd-15">
                                        <p>Birthday : <span>
                                                {{ \Carbon\Carbon::parse($about->dob)->format('j M Y') }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Age : <span>{{ $about->age }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>website : <span>{{ $about->website }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Email : <span>{{ $about->email }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Degree : <span>{{ $about->degree }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Phone : <span>{{ $about->phone }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>City : <span>{{ $about->city }}</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Freelnace : <span>{{ $about->freelance }}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="buttons padd-15">
                                        <a href="#contact" class="btn hire-me">Hire Me</a>
                                    </div>
                                </div>
                            </div>
                            <div class="skills padd-15">
                                <div class="row">
                                    <div class="skill-item padd-15">
                                        <h5>{{ $about->first_language_name }}</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: {{ $about->first_language_pct }}"></div>
                                            <div class="skill-percent">{{ $about->first_language_pct }}</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>{{ $about->second_language_name }}</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: {{ $about->second_language_pct }}">
                                            </div>
                                            <div class="skill-percent">{{ $about->second_language_pct }}</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>{{ $about->third_language_name }}</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: {{ $about->third_language_pct }}"></div>
                                            <div class="skill-percent">{{ $about->third_language_pct }}</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>{{ $about->fourth_language_name }}</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: {{ $about->fourth_language_pct }}">
                                            </div>
                                            <div class="skill-percent">{{ $about->fourth_language_pct }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="education padd-15">
                                <h3 class="title">Education</h3>
                                <div class="timeline-box padd-15">
                                    <div class="timeline shadow-dark">
                                        {{-- timelineitems --}}
                                        <div class="timeline-item">
                                            <div class="circle-dot"></div>
                                            <h4 class="timeline-title">
                                                {{ $about->first_education_title }}
                                            </h4>
                                            <p class="timeline-text">{{ $about->first_education_description }}</p>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="circle-dot"></div>
                                            <h4 class="timeline-title">
                                                {{ $about->second_education_title }}
                                            </h4>
                                            <p class="timeline-text">{{ $about->second_education_description }}</p>
                                        </div>
                                        <div class="timeline-item">
                                            <div class="circle-dot"></div>
                                            <h4 class="timeline-title">
                                                {{ $about->third_education_title }}
                                            </h4>
                                            <p class="timeline-text">{{ $about->third_education_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- about section end --}}
@endsection
@section('Services')
    {{-- services section start --}}
    <section class="service section" id="service">
        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>services</h2>
                </div>
            </div>


            <div class="row">
                @foreach ($services as $service)
                    <div class="service-item padd-15">
                        <div class="service-item-inner">
                            <div class="icon">
                                <i class="fa {{ $service->icon_name }}"></i>
                            </div>
                            <h4> {{ $service->name }}</h4>
                            <p> {{ $service->description }} </p>
                        </div>
                    </div>
                @endforeach
            </div>

    </section>
    {{-- services section end --}}
@endsection
@section('Portfolio')
    {{-- portfolio section start --}}
    <section class="portfolio section" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Portfolio</h2>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-heading padd-15">
                    <h2>My last Project :</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($Portfolio as $portfolio)
                    <div class="card-container portfolio-item padd-15">
                        <figure class="snip1563">
                            <img src="{{ asset('storage/portfolio_images/' . basename($portfolio->img)) }}"
                                alt="PHP Programming" />
                            <figcaption>
                                <h3>{{ $portfolio->language_name }}</h3>
                                <p class="short-description">{{ $portfolio->description }}</p>
                                <a href="{{ $portfolio->url }}" class="view-more"><i class="fa fa-eye"></i> View
                                    Demo</a>

                            </figcaption>
                        </figure>
                    </div>
                @endforeach
                {{-- portfolio item end --}}
            </div>
        </div>
    </section>
    {{-- portfolio section end --}}
@endsection
@section('Contact')
    {{-- contact section start --}}
    <div class="contact section" id="contact">
        <div class="container">
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <h3 class="contact-title padd-15">Have You Any Questions ?</h3>
            <h4 class="contact-sub-title padd-15">"I'M HERE TO ASSIST YOU!"</h4>
            <div class="row">
                @foreach ($About as $about)
                    {{-- contact info item start --}}
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <h4>Call Us On</h4>
                        <p>+92 3427947313</p>
                    </div>
                    {{-- contact info item  end --}}
                    {{-- contact info item start --}}
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                        <h4>Location</h4>
                        <p>{{ $about->city }}</p>
                    </div>
                    {{-- contact info item  end --}}
                    {{-- contact info item start --}}
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-envelope"></i></div>
                        <h4>Email</h4>
                        <p>{{ $about->email }}</p>
                    </div>
                    {{-- contact info item  end --}}
                    {{-- contact info item start --}}
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-globe-europe"></i></div>
                        <h4>Webiste</h4>
                        <p>{{ $about->website }}</p>
                    </div>
                @endforeach
                {{-- contact info item  end --}}

            </div>
            <h3 class="contact-title padd-15">Get in Touch with Us!</h3>
            <h4 class="contact-sub-title padd-15">"CONNECT WITH US ON SOCIAL!"</h4>
            <div class="row">
                @foreach ($Account as $account)
                    <div class="contact-info-item padd-15">
                        <a href="{{ $account->url }}" target="_blank">
                            <div class="icon"><i
                                    class="{{ $account->icon_first_name }} {{ $account->icon_second_name }}"></i></div>
                            <h4>{{ $account->name }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>

            <h3 class="contact-title padd-15">SEND ME ANY EMAIL</h3>
            <h4 class="contact-sub-title padd-15">FEEL FREE TO CONNECT ANYTIME</h4>
            {{-- contact form --}}
            <div class="row">
                <div class="contact-form padd-15">
                    <form id="contactForm" action="{{ url('/StorefeedbackData') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-item col-6 padd-15">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                         />
                                </div>
                                <span class="FormAuthentication">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-item col-6 padd-15">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                      />
                                </div>
                                <span class="FormAuthentication">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-12 padd-15">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject"
                                        />
                                </div>
                                <span class="FormAuthentication">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-12 padd-15">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <span class="FormAuthentication">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-item col-12 padd-15">
                                <button type="submit" class="btn" style="cursor: pointer">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    {{-- contact section end my name is suleman and my father name --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);
            const emptyFields = [];

            // Check for empty fields
            for (const [key, value] of formData.entries()) {
                if (!value) {
                    emptyFields.push(key);
                }
            }

            // If there are empty fields, show a SweetAlert
            if (emptyFields.length > 0) {
                Swal.fire({
                    title: "Empty Fields!",
                    text: "Please fill in the following fields: " + emptyFields.join(', '),
                    icon: "warning"
                });
                return; // Stop further execution
            }

            // If no empty fields, proceed with form submission
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
                // Display success message
                Swal.fire({
                    title: "Success!",
                    text: data.message,
                    icon: "success"
                }).then(() => {
                    window.location.hash = '#contact'; // Navigate to #contact after the alert
                });
            })
            .catch(err => {
                if (err.status === 422) { // Unprocessable Entity for validation errors
                    err.json().then(errors => {
                        let errorMessages = Object.values(errors.errors).flat().join(', ');
                        Swal.fire({
                            title: "Validation Error!",
                            text: errorMessages,
                            icon: "error"
                        });
                    });
                } else {
                    err.json().then(errors => {
                        Swal.fire({
                            title: "already_exists",
                            text: errors.error || Object.values(errors).join(', '),
                            icon: "warning"
                        });
                    });
                }
            });
        });
    });
</script>

@endsection

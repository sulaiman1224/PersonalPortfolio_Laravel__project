@extends('admin-panel/layouts/addData/Main')

@section('Content')


    <div class="container" id="Home">


        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>About</h2>
                <a href="{{ url('/Admin/About/ViewsData') }}">View Data</a>
            </div>
            <div>
                <form id="dataForm" action="{{ url('UpdateAboutDatas/'.$about->id) }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" class="form-control" id="name" type="text"
                                placeholder="web Developer" value="{{$about->name}}"/>
                            <span class="FormAuthentication">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6">
                            <label for="profession" class="form-label">Profession</label>
                            <input name="profession" class="form-control" id="profession" type="text"
                                placeholder="web Developer" value="{{$about->profession}}"/>
                            <span class="FormAuthentication">
                                @error('profession')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="profession_description" class="form-label">profession Description</label>
                            <textarea id="profession_description" class="form-control" placeholder="profession description"
                                name="profession_description">{{ $about->profession_description }}</textarea>
                            <span class="FormAuthentication">
                                @error('profession_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="journey" class="form-label">My journey</label>
                            <textarea id="journey" class="form-control" placeholder="Enter  journey" name="journey">{{ $about->journey }}</textarea>
                            <span class="FormAuthentication">
                                @error('journey')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="skill_1_name" class="form-label">first skill</label>
                            <input name="skill_1_name" class="form-control" id="skill_1_name" type="text"
                                placeholder="Front-End Development"  value="{{$about->skill_1_name}}" />
                            <span class="FormAuthentication">
                                @error('skill_1_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="skill_1_description" class="form-label">first skill Descreption</label>
                            <textarea id="skill_1_description" class="form-control" placeholder="what I do in Front-End Development"
                                name="skill_1_description">{{ $about->skill_1_description}}</textarea>
                            <span class="FormAuthentication">
                                @error('skill_1_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="skill_2_name" class="form-label">second skill</label>
                            <input name="skill_2_name" class="form-control" id="skill_2_name" type="text"
                                placeholder="back-End Development"  value="{{$about->skill_2_name}}" />
                            <span class="FormAuthentication">
                                @error('skill_2_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="skill_2_description" class="form-label">second skill Descreption</label>
                            <textarea id="skill_2_description" class="form-control" placeholder="what I do in back-End Development"
                                name="skill_2_description">{{ $about->skill_2_description}}</textarea>
                            <span class="FormAuthentication">
                                @error('skill_2_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="skill_3_name" class="form-label">Third skill</label>
                            <input name="skill_3_name" class="form-control" id="skill_3_name" type="text"
                                placeholder="Front-End Development"  value="{{$about->skill_3_name}}"/>
                            <span class="FormAuthentication">
                                @error('skill_3_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="skill_3_description" class="form-label">Third skill Descreption</label>
                            <textarea id="skill_3_description" class="form-control" placeholder="what I do in Responsive Design"
                                name="skill_3_description">{{ $about->skill_3_description}}</textarea>
                            <span class="FormAuthentication">
                                @error('skill_3_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="skill_4_name" class="form-label">fourth skill</label>
                            <input name="skill_4_name" class="form-control" id="skill_4_name" type="text"
                                placeholder="Front-End Development"  value="{{$about->skill_4_name}}"/>
                            <span class="FormAuthentication">
                                @error('skill_4_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="skill_4_description" class="form-label">fourth skill Descreption</label>
                            <textarea id="skill_4_description" class="form-control" placeholder="what I do in Performance Optimization"
                                name="skill_4_description">{{ $about->skill_4_description}}</textarea>
                            <span class="FormAuthentication">
                                @error('skill_4_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="skill_5_name" class="form-label">fifth skill</label>
                            <input name="skill_5_name" class="form-control" id="skill_5_name" type="text"
                                placeholder="Front-End Development"  value="{{$about->skill_5_name}}"/>
                            <span class="FormAuthentication">
                                @error('skill_5_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="skill_5_description" class="form-label">fifth skill Descreption</label>
                            <textarea id="skill_5_description" class="form-control" placeholder="what I do in SEO Best Practices"
                                name="skill_5_description">{{ $about->skill_5_description}}</textarea>
                            <span class="FormAuthentication">
                                @error('skill_5_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="my_approach" class="form-label">My Approch</label>
                            <textarea id="my_approach" class="form-control" placeholder="write description" name="my_approach">{{ $about->my_approach}}</textarea>
                            <span class="FormAuthentication">
                                @error('my_approach')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12">
                            <label for="lets_connect" class="form-label">Let's Connect</label>
                            <textarea id="lets_connect" class="form-control" placeholder="write description" name="lets_connect">{{ $about->lets_connect}}</textarea>
                            <span class="FormAuthentication">
                                @error('lets_connect')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    {{-- COTAACT DETAIL --}}
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="dob" class="form-label">DOB</label>
                            <input name="dob" class="form-control" id="dob" type="date"
                                placeholder="Date of birth" value="{{ $about->dob}}"/>
                            <span class="FormAuthentication">
                                @error('dob')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="age" class="form-label">Age</label>
                            <input name="age" class="form-control" id="age" type="number"
                                placeholder="age" value="{{ $about->age}}"/>
                            <span class="FormAuthentication">
                                @error('age')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="website" class="form-label">Website</label>
                            <input name="website" class="form-control" id="website" type="url"
                                placeholder="www.domin.com" value="{{ $about->website}}"/>
                            <span class="FormAuthentication">
                                @error('website')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" class="form-control" id="email" type="email"
                                placeholder="sk12243648gmail.com" value="{{ $about->email}}"/>
                            <span class="FormAuthentication">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-3">
                            <label for="degree" class="form-label">Degree</label>
                            <input name="degree" class="form-control" id="degree" type="degree"
                                placeholder="ADSE" value="{{ $about->degree}}"/>
                            <span class="FormAuthentication">
                                @error('degree')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input name="phone" class="form-control" id="phone" type="tel"
                                placeholder="+92 3427947313" value="{{ $about->phone}}"/>
                            <span class="FormAuthentication">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="city" class="form-label">city</label>
                            <input name="city" class="form-control" id="city" type="text"
                                placeholder="Nushki" value="{{ $about->city}}"/>
                            <span class="FormAuthentication">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-3">
                            <label for="freelance" class="form-label">freelance</label>
                            <input name="freelance" class="form-control" id="freelance" type="freelance"
                                placeholder="Available or Not" value="{{ $about->freelance}}"/>
                            <span class="FormAuthentication">
                                @error('freelance')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    {{-- PERCENATAGE SKILL --}}
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first_language_name" class="form-label">first skill name</label>
                            <input name="first_language_name" class="form-control" id="first_language_name"
                                type="text" placeholder="first skill name eg js" value="{{ $about->first_language_name}}"/>
                            <span class="FormAuthentication">
                                @error('first_language_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="first_language_pct" class="form-label">First skill percentage</label>
                            <input name="first_language_pct" class="form-control" id="first_language_pct" type="text"
                                placeholder="First skill percentage 80%" value="{{ $about->first_language_pct}}"/>
                            <span class="FormAuthentication">
                                @error('first_language_pct')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="second_language_name" class="form-label">second skill name</label>
                            <input name="second_language_name" class="form-control" id="second_language_name"
                                type="text" placeholder="second skill name eg js" value="{{ $about->second_language_name}}"/>
                            <span class="FormAuthentication">
                                @error('second_language_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="second_language_pct" class="form-label">second skill percentage</label>
                            <input name="second_language_pct" class="form-control" id="second_language_pct"
                                type="text" placeholder="second skill percentage eg 80%" value="{{ $about->second_language_pct}}"/>
                            <span class="FormAuthentication">
                                @error('second_language_pct')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label for="third_language_name" class="form-label">Third skill name</label>
                            <input name="third_language_name" class="form-control" id="third_language_name"
                                type="text" placeholder="Third skill name eg js" value="{{ $about->third_language_name}}"/>
                            <span class="FormAuthentication">
                                @error('third_language_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="third_language_pct" class="form-label">Third skill percentage</label>
                            <input name="third_language_pct" class="form-control" id="third_language_pct" type="text"
                                placeholder="Third skill percentage eg 80%" value="{{ $about->third_language_pct}}"/>
                            <span class="FormAuthentication">
                                @error('third_language_pct')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="fourth_language_name" class="form-label">fourt skill name</label>
                            <input name="fourth_language_name" class="form-control" id="fourth_language_name"
                                type="text" placeholder="fourt skill name eg js" value="{{ $about->fourth_language_name}}"/>
                            <span class="FormAuthentication">
                                @error('fourth_language_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="fourth_language_pct" class="form-label">fourt skill percentage</label>
                            <input name="fourth_language_pct" class="form-control" id="fourth_language_pct"
                                type="text" placeholder="fourt skill percentage eg 80%" value="{{ $about->fourth_language_pct}}"/>
                            <span class="FormAuthentication">
                                @error('fourth_language_pct')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="first_education_title" class="form-label">first education_title</label>
                            <input name="first_education_title" class="form-control" id="first_education_title"
                                type="text" placeholder="Educational Background" value="{{ $about->first_education_title}}"/>
                            <span class="FormAuthentication">
                                @error('first_education_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="first_education_description" class="form-label">First education
                                Description</label>
                            <textarea id="first_education_description" class="form-control" placeholder=" i am ...."
                                name="first_education_description">{{ $about->first_education_description }}</textarea>
                            <span class="FormAuthentication">
                                @error('first_education_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="second_education_title" class="form-label">Second education_title</label>
                            <input name="second_education_title" class="form-control" id="second_education_title"
                                type="text" placeholder="Educational Background" value="{{ $about->second_education_title}}"/>
                            <span class="FormAuthentication">
                                @error('second_education_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="second_education_description" class="form-label">Second education
                                Descreption</label>
                            <textarea id="second_education_description" class="form-control" placeholder=" i am ...."
                                name="second_education_description">{{ $about->second_education_description}}</textarea>
                            <span class="FormAuthentication">
                                @error('second_education_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="third_education_title" class="form-label">Third education_title</label>
                            <input name="third_education_title" class="form-control" id="third_education_title"
                                type="text" placeholder="Educational Background" value="{{ $about->third_education_title}}"/>
                            <span class="FormAuthentication">
                                @error('third_education_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="third_education_description" class="form-label">Third education
                                Descreption</label>
                            <textarea id="third_education_description" class="form-control" placeholder=" i am ...."
                                name="third_education_description">{{ $about->third_education_description }}</textarea>
                            <span class="FormAuthentication">
                                @error('third_education_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary btn-block" value="Update Data" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

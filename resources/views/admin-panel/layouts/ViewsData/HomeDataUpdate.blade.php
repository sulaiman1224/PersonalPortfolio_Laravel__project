@extends('admin-panel/layouts/addData/Main')

@section('Content')
<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Update Home Data</h2>
            <a href="{{ url('/Admin/Home') }}">View Data</a>
        </div>
        <div>
            <form id="dataForm" action="{{ url('UpdateHomeData/'.$AdminHomes->id) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="Name" class="form-label">Enter Name</label>
                        <input name="Name" class="form-control" id="Name" type="text" placeholder="Sulaiman" value="{{ $AdminHomes->Name }}" />
                        <span class="FormAuthentication">@error("Name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="F_letter" class="form-label">Name First Letter</label>
                        <input name="F_letter" class="form-control" id="F_letter" type="text" placeholder="S" value="{{ $AdminHomes->F_letter }}" />
                        <span class="FormAuthentication">@error("F_letter") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Skip_F_letter" class="form-label">Skip First Letter</label>
                        <input name="Skip_F_letter" class="form-control" id="Skip_F_letter" type="text" placeholder="ulaiman" value="{{ $AdminHomes->Skip_F_letter }}" />
                        <span class="FormAuthentication">@error("Skip_F_letter") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Profession_1" class="form-label">Profession 1</label>
                        <input name="Profession_1" class="form-control" id="Profession_1" type="text" placeholder="Frontend Developer" value="{{ $AdminHomes->Profession_1 }}" />
                        <span class="FormAuthentication">@error("Profession_1") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Profession_2" class="form-label">Profession 2</label>
                        <input name="Profession_2" class="form-control" id="Profession_2" type="text" placeholder="Backend Developer" value="{{ $AdminHomes->Profession_2 }}" />
                        <span class="FormAuthentication">@error("Profession_2") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="Profession_3" class="form-label">Profession 3</label>
                        <input name="Profession_3" class="form-control" id="Profession_3" type="text" placeholder="Full Stack Developer" value="{{ $AdminHomes->Profession_3 }}" />
                        <span class="FormAuthentication">@error("Profession_3") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="Descreption" class="form-label">Page Description</label>
                        <textarea id="Descreption" class="form-control" placeholder="Enter page description" name="Descreption">{{ $AdminHomes->Descreption }}</textarea>
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
                        <input type="submit" class="btn btn-primary btn-block" value="Update Data" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

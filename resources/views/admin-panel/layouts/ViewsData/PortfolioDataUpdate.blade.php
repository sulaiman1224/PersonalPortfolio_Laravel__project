@extends('admin-panel/layouts/addData/Main')

@section('Content')


<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Portfolio</h2>
            <a href="{{ url('/Admin/Portfolio/ViewsData') }}">View Data</a>
        </div>
        <div>
            <form id="dataForm" action="{{ url('UpdatePortfolioData/'.$portfolio->id) }}" method="POST"   enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="img" class="form-label">Upload project Image</label>
                        <input class="form-control" id="img" type="file" name="img" accept="image/*"/>
                        <span class="FormAuthentication">@error("img") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="language_name" class="form-label">language Name</label>
                        <input name="language_name" class="form-control" id="language_name" type="text" placeholder="Php" value="{{ $portfolio->language_name }}"/>
                        <span class="FormAuthentication">@error("language_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-6">
                        <label for="url" class="form-label">url</label>
                        <input name="url" class="form-control" id="url" type="text" placeholder="http/vaccination.com" value="{{ $portfolio->url }}"/>
                        <span class="FormAuthentication">@error("url") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="descreption" class="form-label">Description</label>
                        <textarea id="descreption" class="form-control" placeholder="description" name="description">{{ $portfolio->description }}</textarea>
                        <span class="FormAuthentication">@error("descreption") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                       <input type="submit" class="btn btn-primary btn-block" value="update Data portfolio" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

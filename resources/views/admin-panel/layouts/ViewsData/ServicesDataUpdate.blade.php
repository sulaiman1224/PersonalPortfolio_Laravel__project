@extends('admin-panel/layouts/addData/Main')

@section('Content')

<div class="container" id="Home">
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Services</h2>
                <a href="{{ url('/Admin/Service/ViewData') }}">View Data</a>
            </div>
            <div>
            <form id="dataForm" action="{{ url('UpdateServicesData/'.$service->id) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" class="form-control" id="name" type="text" placeholder="Dynamic Web Development" value="{{ $service->name }}"/>
                        <span class="FormAuthentication">@error("name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="icon_name" class="form-label">Enter icon Name</label>
                        <input name="icon_name" class="form-control" id="icon_name" type="text" placeholder="Fa-cart-shoping" value="{{ $service->icon_name }}"/>
                        <span class="FormAuthentication">@error("icon_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Page Description</label>
                        <textarea id="description" class="form-control" placeholder="Enter page description" name="description">{{ $service->description }}</textarea>
                        <span class="FormAuthentication">@error("description") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="update Data services" name="submit">
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>

<!-- Include SweetAlert -->

@endsection

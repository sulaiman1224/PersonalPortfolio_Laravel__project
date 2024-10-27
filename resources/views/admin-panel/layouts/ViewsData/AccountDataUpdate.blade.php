@extends('admin-panel/layouts/addData/Main')

@section('Content')

<div class="container" id="Home">
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Accounts</h2>
            <a href="{{ url('/Admin/Accounts/ViewsData') }}">View Data</a>
        </div>
        <div>
            <form id="dataForm" action="{{ url('UpdateAccountData/'.$account->id) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="url" class="form-label">url</label>
                        <input name="url" class="form-control" id="url" type="url" placeholder="Dynamic Web Development"  value="{{    $account->url }}"/>
                        <span class="FormAuthentication">@error("url") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="icon_first_name" class="form-label">Enter icon Name</label>
                        <input name="icon_first_name" class="form-control" id="icon_first_name" type="text" placeholder="Fa-cart-shoping" value="{{    $account->icon_first_name }}"/>
                        <span class="FormAuthentication">@error("icon_first_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="icon_second_name" class="form-label">Enter icon Name</label>
                        <input name="icon_second_name" class="form-control" id="icon_second_name" type="text" placeholder="Fa-cart-shoping" value="{{    $account->icon_second_name }}"/>
                        <span class="FormAuthentication">@error("icon_second_name") {{ $message }} @enderror</span>
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">application Name</label>
                        <input name="name" class="form-control" id="name" type="text" placeholder="Dynamic Web Development" value="{{    $account->name }} "/>
                        <span class="FormAuthentication">@error("name") {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block" value="Upfate Data Accounts" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@extends('layouts.master')
@section('title')
Zine Collective | International Marketing
@endsection
@section('content')



<div class="container-fluid">
  <div class="row">
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      <div class="clinic-s">
        <div class="row py-4 container-fluid ">
          <div class="col-md-12">
            <div class="page-heading">Compaign</div>
          </div>
        </div>
      </div>
      <div class="page-header row py-4 justify-content-center">
        <div class="col-md-9" style=" margin: 70px">

          <div class="card card-small clinic-card">
            <div class="card-header border-bottom">
              Compaign
            </div>
            <div class="card-body">
              <form method="post" action="{{route('save-compaign')}}">
                @csrf
                <input type="hidden" name="customerid" value="{{$id}}" />
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label class="mb-2 formlabel">Enter Compaign link</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Enter Compaign link" required value="{{$user->compaign_link ?? ''}}">
                  </div>

                </div>
                <button type="submit" class="btn btn-primary btn-add">Update Compaign</button>
              </form>
            </div>
          </div>
        </div>

    </main>
  </div>
</div>

@endsection

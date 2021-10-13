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
            <div class="page-heading">Add Appointment</div>
          </div>
        </div>
      </div>
      <div class="page-header row py-4 justify-content-center">
        <div class="col-md-9" style=" margin: 70px">
          <div class="card card-small clinic-card">
            <div class="card-header border-bottom">
              Add Appointment
            </div>
            <div class="card-body">
              <form method="post" action="{{route('Appointment.store')}}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label class="mb-2 formlabel">Date</label>
                    <input type="date" name="appointment_date" class="form-control" id="appointment_date" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="mb-2 formlabel">Time</label>
                    <input type="time" name="app_time" class="form-control" id="app_time" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label class="mb-2 formlabel">Appointment type</label>
                    <select class="form-control" name="appointment_type" id="appointment_type" required>
                      <option value=" ">Appointment type</option>
                      <option value="continuing">Continuing</option>
                      <option value="term">Term</option>
                      <option value="contract">Contract</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label class="mb-2 formlabel">Customer</label>
                    <select class="form-control" name="user_id" required>
                      <option value="">Customer</option>
                      @foreach($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label class="mb-2 formlabel">Commments</label>
                    <textarea name="comments" class="form-control" style="padding:15%;" required>
                                  </textarea>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-add">Add Appointment</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
</div>

@endsection
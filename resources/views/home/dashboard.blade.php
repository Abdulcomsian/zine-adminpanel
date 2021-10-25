@extends('layouts.master')
@section('title')
Zine Collective | International Marketing
@endsection
@section('content')




<div class="container-fluid">
  <div class="row">
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row py-4 justify-content-center">
          <!--Displaying the Total Registered Clinics as well as Total Revenue Generated-->

          <div class="col-md-6">
            <div class="card welcome-card">
              <div class="s">
                <div class="d-flex align-content-center align-middle bd-highlight">
                  <div class="icon1 text-center"><img src="images/specialist-user.png"></div>
                  <div class="flex-grow-1 valtop">
                    <div class="heading">Total Clients</div>
                    <div class="cont-val">{{$totalcustomers}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card welcome-card">
              <div class="s">
                <div class="d-flex align-content-center align-middle bd-highlight">
                  <div class="icon2 text-center"><img src="images/deadline.png"></div>
                  <div class="flex-grow-1 valtop">
                    <div class="heading2">Total Appointment</div>
                    <div class="cont-val">{{$total_app}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End here-->

        </div>

      </div>
    </main>
  </div>
</div>

@endsection
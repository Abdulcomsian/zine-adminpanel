
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
                	<div class="page-heading">Profile</div>
                </div>
            </div>
            </div>
          <div class="page-header row py-4 justify-content-center">
            <div class="col-md-9" style=" margin: 70px">
              
                <div class="card card-small clinic-card">
                  <div class="card-header border-bottom">
                   Profile
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="form-row">
                            <div class="form-group col-md-12">
                                <header class="page-cover">
                                    <div class="text-center">
                                      <a href="profile.html" class="user-avatar user-avatar-xl"><img src="images/avatars/1.jpg" alt=""></a>
                                      <h2 class="h4 mt-2 mb-0"> Zine Collective </h2>
                                      <div class="my-1">
                                        <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="fa fa-star text-yellow"></i> <i class="far fa-star text-yellow"></i>
                                      </div>
                                      <p class="text-muted"> Project Manager @ Zine Collective </p>
                                      <p> Huge fan of HTML, CSS and Javascript. Web design and open source lover. </p>
                                    </div><!-- .cover-controls -->
                                  
                                  </header>
                              
                            </div>
                           
                        </div>
                     
                      <button type="submit" class="btn btn-primary btn-add">update</button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    @endsection

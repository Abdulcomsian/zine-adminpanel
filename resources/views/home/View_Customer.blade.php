

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
                        <div class="page-heading">View Customer </div>
                    </div>
                </div>
            </div>
            <div class="main-content-container container-fluid px-4">
              <!-- Page Header -->
              <div class="page-header py-4">
                <div class="pagination-container float-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">
                                <i class="material-icons">
                                    navigate_before
                                  </i>
                              </span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">
                                <i class="material-icons">
                                    navigate_next
                                  </i>
                              </span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                  </div>
                  <div class=" table-responsive-sm">
                    <table  class="table  table-sm table-hover ">
                      <!-- <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm"> -->
                      <thead  class="thead-dak">
                        <tr>
                          <th scope="col">SR#</th>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Contact</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mazankowski Alberta Heart Institute</td>
                          <td>abc@gmail.com</td>
                          <td>+44 20 7501 3333</td>
                          
                          <td><a href="compaign"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Mazankowski Alberta Heart Institute</td>
                          <td>abc@gmail.com</td>
                          <td>+44 20 7501 3333</td>
                          <td><a href="compaign"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Mazankowski Alberta Heart Institute</td>
                          <td>abc@gmail.com</td>
                          <td>+44 20 7501 3333</td>
                          <td><a href="compaign"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="pagination-container float-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">
                                <i class="material-icons">
                                    navigate_before
                                  </i>
                              </span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">
                                <i class="material-icons">
                                    navigate_next
                                  </i>
                              </span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                  </div>
              </div>            
            </div>
        </main>
    </div>
</div>

    @endsection

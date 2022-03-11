@extends('layouts.master')
@section('title')
    Zine Collective | International Marketing
@endsection
@section('css')
    <style>
        #customertable_filter {
            float: right;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="clinic-s">
                    <div class="row py-4 container-fluid ">
                        <div class="col-md-12">
                            <div class="page-heading">View Client</div>
                        </div>
                    </div>
                </div>
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header py-4">
                        <!-- <div class="pagination-container float-right">
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
                        </div> -->
                        <div class=" table-responsive-sm">
                            <table class="table  table-sm table-hover " id="customertable">
                                <!-- <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm"> -->
                                <thead class="thead-dak">
                                <tr>
                                    <th scope="col">SR#</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Appointments</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->appointments_count}}</td>
                                        <td>{{$customer->phone_number}}</td>
                                        <td class="d-flex">
                                            <a href="{{url('compaign',$customer->id)}}"><i class="fa fa-plus"
                                                                                           aria-hidden="true"></i></a>
                                            <form method="POST" action="{{ url('customer',$customer->id) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" title="Delete">
                                                    <i class="fa fa-trash" style="color: #007bff; margin-left: 10px" type="submit" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="pagination-container float-right">
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
                        </div> -->
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#customertable').DataTable();
        });
    </script>
@endsection

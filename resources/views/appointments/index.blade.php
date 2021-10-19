@extends('layouts.master')
@section('title')
    Zine Collective | International Marketing
@endsection
@section('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="clinic-s">
                    <div class="row py-4 container-fluid ">
                        <div class="col-md-12">
                            <div class="page-heading">View Appointment</div>
                        </div>
                    </div>
                </div>

                {{--          <div class="page-header row py-4 justify-content-center">--}}
                {{--            <div class="col-md-9" style=" margin: 70px">--}}
                {{--                <div class="card card-small clinic-card">--}}
                {{--                      <div class="card-header border-bottom">--}}
                {{--                        View Appointment--}}
                {{--                      </div>--}}
                {{--                      <div class="card-body">--}}
                {{--                          <h2>hello</h2>--}}
                {{--                      </div>--}}
                {{--                </div>--}}
                {{--              </div>--}}
                {{--          </div>--}}
                <div class="page-header row py-4 justify-content-center">
                    <div class="col-md-9" style=" margin: 70px">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
{{--Start Modal--}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Appointment</h4>
                    <input hidden name="id" id="id">
                    <input hidden name="event_id" id="event_id">

                    Date:
                    <br />
                    <input type="date" class="form-control" name="date" id="date">

                    <br />
                    Time:
                    <br />
                    <input type="time" class="form-control" name="time" id="time">

                    <br />
                    Type :
                    <br />
                    <select name="type" id="type" class="form-control">
                        <option value="">Select type</option>
                        <option value="Continuing">Continuing</option>
                        <option value="Term">Term</option>
                        <option value="Contract">Contract</option>
                    </select>

                    <br />
                    Customer:
                    <br />
                    <select name="user_id" id="users" class="form-control">
                        <option value="">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>

                    <br />
                    Comments:
                    <br />
                    <textarea class="form-control" name="comments" id="comments" cols="10" rows="3"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
                </div>
            </div>
        </div>
    </div>
{{--End Modal--}}

@endsection
@section('script')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                defaultView: 'month',
                eventColor: 'white',
                events : [
                        @foreach($appointments as $appointment)
                            {
                                id : '{{ $appointment->id }}',
                                user_id : '{{ $appointment->user_id }}',
                                comments : '{{ $appointment->comments }}',
                                title : '{{ ucfirst($appointment->type) .'|'. ucfirst($appointment->user->name) }}',
                                start : '{{ $appointment->date_time }}',
                                end: '{{ $appointment->date_time }}',
                            },
                        @endforeach
                ],
                eventClick: function(calEvent, jsEvent, view) {
                    let type = calEvent.title.split('|')[0];
                    let user_id = calEvent.user_id;

                    $("#type option").filter(function() {
                        return $(this).text() == type;
                    }).prop('selected', true);

                    $("#users option").filter(function() {
                        return $(this).val() == user_id;
                    }).prop('selected', true);


                    $('#event_id').val(calEvent._id);
                    $('#id').val(calEvent.id);
                    $('#date').val(moment(calEvent.start).format('YYYY-MM-DD'));
                    $('#time').val(moment(calEvent.start).format('HH:mm:ss'));
                    $('#comments').text(calEvent.comments);
                    $('#editModal').modal();
                }
            });

            //Ajax call for updating appointment
            $('#appointment_update').click(function(e) {
                e.preventDefault();
                var data = {
                    _token: '{{ csrf_token() }}',
                    id: $('#id').val(),
                    date: $('#date').val(),
                    time: $('#time').val(),
                    type: $('#type').val(),
                    user_id: $('#users').val(),
                };
                var url = '{{ route('appointments.update',':id') }}';
                url = url.replace(':id',$('#id').val());
                console.log('url',url);
                console.log('data',data);
                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: data,
                    success: function(result) {
                        console.log('success',result);
                        $('#calendar').fullCalendar('removeEvents', $('#event_id').val());

                        $('#calendar').fullCalendar('renderEvent', {
                            id : result.id ,
                            user_id : result.user_id ,
                            comments : result.comments ,
                            title : result.type + '|' + result.user.name ,
                            start : result.date_time ,
                            end: result.date_time ,
                        }, true);

                        $('#editModal').modal('hide');
                    }

                // $.post(url, data,    ,, function( result ) {
                //     $('#calendar').fullCalendar('removeEvents', $('#event_id').val());
                //
                //     $('#calendar').fullCalendar('renderEvent', {
                //         id : result.id ,
                //         user_id : result.user.id ,
                //         comments : result.comments ,
                //         title : ucfirst(result.type) + '|' + ucfirst(result.user.name) ,
                //         start : result.date_time ,
                //         end: result.date_time ,
                //     }, true);
                //
                //     $('#editModal').modal('hide');
                });
            });

        });
    </script>
@endsection


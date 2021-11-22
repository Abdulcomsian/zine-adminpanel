@extends('layouts.master')
@section('title')
    Zine Collective | International Marketing
@endsection
@section('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>
    <style>
        .modal-footer {
            padding: 10px 0px;
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         data-backdrop='static' data-keyboard='false'>
        <div class="modal-dialog" role="document" style="transform: none">
            <div class="modal-content">
                <form method="post" action="" enctype="multipart/form-data" id="form">
                    <div class="modal-body">
                        <h4>Appointment</h4>
                        @csrf
                        @method('PUT')
                        <input hidden name="id" id="id">
                        <input hidden name="event_id" id="event_id">

                        <div class="row">
                            <div class="col-md-6">
                                Date:
                                <br/>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                            <div class="col-md-6">
                                Time:
                                <br/>
                                <input type="time" class="form-control" name="time" id="time">
                            </div>
                            <div class="col-md-6 mt-2">
                                Type :
                                <br/>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select type</option>
                                    <option value="Buyer">Buyer</option>
                                    <option value="Seller">Seller</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-2">
                                Client:
                                <br/>
                                <select name="user_id" id="users" class="form-control">
                                    <option value="">Select Client</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                Comments:
                                <br/>
                                <textarea class="form-control" name="comments" id="comments" cols="10"
                                          rows="3"></textarea>
                            </div>
                            <div class="col-md-6 mt-2 mb-2">
                                Upload Audio:
                                <br/>
                                <input id="newAudio" type="file" name="audio" class="form-control">
                                <div id="audioDiv">
                                    <label for="" class="mt-1">Old Audio</label>
                                    <audio controls id="audio">
                                        {{--                                <source id="audio" src="uploads/appointment_audio_path/202110201252_abc.mp3" type="audio/mpeg">--}}
                                        <source id="source" src="" type="audio/mpeg">
                                    </audio>
                                </div>
                            </div>
                        </div>
                   
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"
                                    onclick="document.getElementById('audio').pause();">Close
                            </button>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </form>
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
                        events: [
                            @foreach($appointments as $appointment)
                                {
                                    id: '{{ $appointment->id }}',
                                    user_id: '{{ $appointment->user_id }}',
                                    comments: '{{ $appointment->comments }}',
                                    title: '{{ ucfirst($appointment->type) .'|'. ucfirst($appointment->user->name) }}',
                                    start: '{{ $appointment->date_time }}',
                                    end: '{{ $appointment->date_time }}',
                                    audio: '{{ $appointment->audio }}',
                                    contact: '{{ $appointment->contact }}',
                                },
                            @endforeach
                        ],
                        eventClick: function (calEvent, jsEvent, view) {
                            let type = calEvent.title.split('|')[0];
                            let user_id = calEvent.user_id;

                            $("#type option").filter(function () {
                                return $(this).text() == type;
                            }).prop('selected', true);

                            $("#users option").filter(function () {
                                return $(this).val() == user_id;
                            }).prop('selected', true);

                            if (calEvent.audio) {
                                var audio = document.getElementById('audio');
                                var source = document.getElementById('source');
                                source.src = calEvent.audio;
                                audio.load();
                                $('#audioDiv').show();
                            } else {
                                $('#audioDiv').hide();
                            }

                            var url = '{{ route('appointments.update',':id') }}';
                            url = url.replace(':id', calEvent.id);

                            $('#form').attr('action',url);
                            $('#event_id').val(calEvent._id);
                            $('#id').val(calEvent.id);
                            $('#date').val(moment(calEvent.start).format('YYYY-MM-DD'));
                            $('#time').val(moment(calEvent.start).format('HH:mm'));
                            $('#comments').text(calEvent.comments);
                            $('#editModal').modal();
                        }
                    });
                });
            </script>
@endsection


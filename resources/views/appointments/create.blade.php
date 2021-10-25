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
                                <form method="post" action="{{route('appointments.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Date</label>
                                            <input class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" type="date" name="date"  id="date" required>
                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Time</label>
                                            <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}" id="time" required>
                                            @error('time')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Appointment type</label>
                                            <select class="form-control @error('type') is-invalid @enderror" name="type" id="appointment_type" required>
                                                <option value="">Select type</option>
                                                <option value="Buyer" {{ old('type') == 'Buyer' ? 'selected' : '' }}>Buyer</option>
                                                <option value="Seller" {{ old('type') == 'Seller' ? 'selected' : '' }}>Seller</option>
                                                <option value="Both" {{ old('type') == 'Both' ? 'selected' : '' }}>Both</option>
                                            </select>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Client</label>
                                            <select class="form-control @error('user_id') is-invalid @enderror"  name="user_id" required>
                                                <option>Select Client</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}" {{ old('user_id') == $customer->id ? 'selected' : '' }}>{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Contact #</label>
                                            <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" id="contact" >
                                            @error('contact')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Upload Audio File</label>
                                            <input type="file" name="audio" class="form-control @error('audio') is-invalid @enderror" value="{{ old('audio') }}" id="audio" required>
                                            @error('audio')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="mb-2 formlabel">Commments</label>
                                            <textarea name="comments" class="form-control @error('comments') is-invalid @enderror" required> {{ old('comments') }}</textarea>
                                            @error('comments')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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

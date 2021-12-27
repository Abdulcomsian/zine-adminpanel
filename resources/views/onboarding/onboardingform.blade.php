@extends('layouts.master')
@section('title')
Zine Collective | Onboarding Link
@endsection
@section('css')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="clinic-s">
                <div class="row py-4 container-fluid ">
                    <div class="col-md-12">
                        <div class="page-heading">Onboarding Link </div>
                    </div>
                </div>
            </div>
            <div class="main-content-container container-fluid px-4">
                <div class="page-header py-4">
                    <div class="col-md-9" style=" margin: 70px">
                        <div class="card card-small clinic-card">
                            <div class="card-header border-bottom">
                                Add Link
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('onboarding.store')}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="mb-2 formlabel">Onboarding Link:
                                                <Link>
                                                </Link>
                                            </label>
                                            <input type="text" class="form-control" id="link" name="link" value="{{$onboardinglink->link ?? 'https://form.jotform.com/202872628835363'}}" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-add">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
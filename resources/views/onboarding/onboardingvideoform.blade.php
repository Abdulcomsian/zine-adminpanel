@extends('layouts.master')
@section('title')
Zine Collective | Onboarding video Link
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
                        <div class="page-heading">Onboarding video Link </div>
                    </div>
                </div>
            </div>
            <div class="main-content-container container-fluid px-4">
                <div class="page-header py-4">
                    <div class="col-md-9" style=" margin: 70px">
                        <div class="card card-small clinic-card">
                            <div class="card-header border-bottom">
                                Add video Link
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('onboarding.storevideo')}}">
                                    @csrf
                                    <div class="form-row" id="appendlink">
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Onboarding video Link:
                                            </label>
                                            <input type="text" class="form-control" id="link" name="link[]" placeholder="Video Link" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="mb-2 formlabel">Onboarding video type:
                                            </label>
                                            <select class="form-control" id="link_type" name="link_type[]">
                                                <option value="youtube" selected>Youtube</option>
                                                <option value="vemio">Vemio</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="mb-2 formlabel">Add more
                                            </label>
                                            <button type="button" class="btn btn-success addmorelink"><span class="fa fa-plus"></span> Add More</button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-add">Submit</button>
                                </form>
                                <br>
                                <hr>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>S-no</th>
                                            <th>Video Link</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($videolinks as $link)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$link->link}}</td>
                                            <td>{{$link->link_type}}</td>
                                            <td>
                                                <button class="btn btn-danger deletelink" data-id="{{$link->id}}"><span class="fa fa-trash"></span></button>
                                                <form class="d-none" method="POST" action="{{route('onboarding.destroy', $link->id)}}" id="form_{{$link->id}}">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
@section('script')
<script>
    var append = `<div class="d-flex w-100">
                    <div class="form-group col-md-4">
                        <label class="mb-2 formlabel">Onboarding video Link:
                        </label>
                        <input type="text" class="form-control" id="link" name="link[]" placeholder="video Link" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="mb-2 formlabel">Onboarding video type:
                        </label>
                        <select class="form-control" id="link_type" name="link_type[]">
                            <option value="youtube" selected>Youtube</option>
                            <option value="vemio">Vemio</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="mb-2 formlabel">Remove
                        </label>
                        <button type="button" class="btn btn-danger removelink"><span class="fa fa-minus"></span></button>
                    </div>
                  </div>
                    `;
    $(".addmorelink").on('click', function() {
        $("#appendlink").append(append);
    })

    //remove button click 
    $(document).on("click", ".removelink", function() {
        $(this).parent().parent().remove();
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $(".deletelink").on('click', function() {
        id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                    $("#form_" + id + "").submit();
                }
            });
    })
</script>
@endsection
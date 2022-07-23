@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Services</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row pt-4 pb-4 px-2">
                                <div class="col-md-12">
                                    <div class="service-add-btn">
                                        <a href="service1.html" class="add-user">Add Service</a>
                                    </div>
                                    @foreach ($haukings as $hauking)
                                        <div class="service-wrapper">
                                            <div class="service-name">
                                                <p>{{$hauking->service_name}}</p>
                                            </div>
                                            <div class="service-edit-del-btn">
                                                <a href="service1.html" class="edit-btn"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a href="javascrit:void()" class="del-btn"
                                                   data-id="{{$hauking->id}}"><i
                                                        class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-md-8 col-sm-8 pull-right">
                                        <ul class="pagination pull-right">
                                            {{ $haukings->links("pagination::bootstrap-4") }}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @endpush
    @section('scripts')
        @parent
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
        <script>
            $(function () {
                $('.del-btn').on('click', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    var user_id = $(this).data('id');

                    bootbox.confirm({
                        title: "Are you sure?",
                        message: "Your about to delete this user!",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    dataType: "json",
                                    url: '/admin/service/delete/',
                                    data: {'id': user_id},
                                    success: function (data) {
                                        if (data.status == true) {
                                            toastr.success(data.message);
                                            setInterval(function () {
                                                window.location.reload();
                                            }, 5000);
                                        } else {
                                            toastr.error(data.message);
                                        }
                                    },
                                    error: function (err) {
                                        toastr.error(data.message);
                                    }
                                });

                            }
                        }
                    });
                });

            });
        </script>
    @endsection
@endsection

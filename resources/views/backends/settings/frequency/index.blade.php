@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Frequency</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12 position-relative">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="frequencyAddBtn">
                                        <button class="add-user " id="add-frequency"> Add Frequency</button>
                                        <input type="text" placeholder="Enter Frequency Name.." id="frequency" class="hide">
                                        <span class="hide" id="addFrequencyBtn"><i class="bi bi-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table" id="frequency-table">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th class="text-nowrap" scope="col">ID</th>
                                            <th class="text-nowrap" scope="col">Frequency Name</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody class="frequency-data">
                                        @foreach ($frequency as $f)
                                            <tr>
                                                <td scope="row">{{$f->id}}</td>
                                                <td scope="row">{{$f->frequency_name}}</td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                               {{($f->status==true)?"checked":""}}  data-id="{{$f->id}}"
                                                               class="toggle-class">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="javascrit:void()" class="del-btn"
                                                           data-id="{{$f->id}}"><i
                                                                class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 pull-right">
                                <ul class="pagination pull-right">
                                    {{ $frequency->links("pagination::bootstrap-4") }}
                                </ul>
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
                $('.toggle-class').change(function () {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var frequency_id = $(this).data('id');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/frequency/status/',
                        data: {'status': status, 'id': frequency_id},
                        success: function (data) {
                            console.log(data.success)
                            if (data.status == true) {
                                toastr.success(data.message);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(data.message);
                        }
                    });
                });

                $('.del-btn').on('click', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    var frequency_id = $(this).data('id');

                    bootbox.confirm({
                        title: "Are you sure?",
                        message: "Your about to delete this frequency!",
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
                                    url: '/admin/frequency/delete/',
                                    data: {'id': frequency_id},
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

                let frequencyBtn = document.querySelector("#addFrequencyBtn");
                let addfrequency = document.querySelector("#add-frequency");
                addfrequency.onclick = function () {
                frequency.classList.remove("hide")
                frequencyBtn.classList.remove("hide");
                };
                frequencyBtn.onclick = function () { 
                     
                let frequencyName = document.getElementById("frequency").value;
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/frequency/create/',
                        data: {'frequency_name': frequencyName},
                        success: function (data) {
                            console.log(data.success)
                            if (data.status == true) {
                                toastr.success(data.message);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                        error: function (err) {
                            toastr.error(data.message);
                        }
                    });
                };
            });
        </script>
    @endsection
@endsection

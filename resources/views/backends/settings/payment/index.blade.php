@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">
                <h2>Payment Settings:</h2>
                <div class="col-md-6 col-sm-12">
                    <div class="current-data shadow">
                        <h2>Paypal</h2>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Email ID:</th>
                                <td><input type="text" value="xxx@gmail.com"></td>
                            </tr>
                            <tr>
                                <th>Secrect Key:</th>
                                <td><input type="text" value="32423LJL"></td>
                            </tr>
                            <tr>
                                <th>Mode:</th>
                                <td>
                                    <select name="mode" id="mode">
                                        <option value="demo">Demo</option>
                                        <option value="live">Live</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Default Payment:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Display Order:</th>
                                <td>
                                    <select name="dorder" id="dorder">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="tex-insert-btn mt-3">
                            <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="current-data shadow">
                        <h2>Stripe</h2>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Mode:</th>
                                <td>
                                    <select name="mode" id="mode">
                                        <option value="demo">Demo</option>
                                        <option value="live">Live</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Test Publishable Key:</th>
                                <td><input type="text" value="32423LJL"></td>
                            </tr>
                            <tr>
                                <th>Test Secrect Key:</th>
                                <td><input type="text" value="32423LJL"></td>
                            </tr>
                            <tr>
                                <th>Live Publishable Key:</th>
                                <td><input type="text" value="32423LJL"></td>
                            </tr>
                            <tr>
                                <th>Live Secrect Key:</th>
                                <td><input type="text" value="32423LJL"></td>
                            </tr>
                            <tr>
                                <th>Default Payment:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>Display Order:</th>
                                <td>
                                    <select name="dorder" id="dorder">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="tex-insert-btn mt-3">
                            <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Save</button>
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
                    var user_id = $(this).data('id');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType: "json",
                        url: '/admin/users/status/',
                        data: {'status': status, 'id': user_id},
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
                                    url: '/admin/users/delete/',
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

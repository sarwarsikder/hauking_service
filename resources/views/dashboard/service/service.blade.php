@extends('dashboard.layouts.master')


@section('title')
    Service
@endsection

@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Services</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
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

                                    <div class="service-wrapper">
                                        <div class="service-name">
                                            <p>Service 1</p>
                                        </div>
                                        <div class="service-edit-del-btn">
                                            <a href="service1.html" class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                            <a href="" class="del-btn"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="service-wrapper">
                                        <div class="service-name">
                                            <p>Service 1</p>
                                        </div>
                                        <div class="service-edit-del-btn">
                                            <a href="service1.html" class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                            <a href="" class="del-btn"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="service-wrapper">
                                        <div class="service-name">
                                            <p>Service 2</p>
                                        </div>
                                        <div class="service-edit-del-btn">
                                            <a href="service2.html" class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                            <a href="" class="del-btn"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="service-wrapper">
                                        <div class="service-name">
                                            <p>Service 2</p>
                                        </div>
                                        <div class="service-edit-del-btn">
                                            <a href="service2.html" class="edit-btn"><i class="bi bi-pencil-square"></i></a>
                                            <a href="" class="del-btn"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

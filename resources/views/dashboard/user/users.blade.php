@extends('dashboard.layouts.master')

@section('title')
    Users
@endsection

@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Users</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-md-12 position-relative">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-left">
                                        <a href="#" class="add-user"> <span><i class="bi bi-person-plus"></i></span>
                                            Add User</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th class="text-nowrap" scope="col">User ID</th>
                                                <th class="text-nowrap" scope="col">First Name</th>
                                                <th class="text-nowrap" scope="col">Last Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Services</th>
                                                <th scope="col">Active</th>
                                            </tr>
                                        </thead>

                                        <tbody class="user-data">
                                            <tr>
                                                <td scope="row">01</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">02</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">03</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">04</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">05</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">06</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row">07</td>
                                                <td scope="row">Eklas</td>
                                                <td scope="row">Mahmud</td>
                                                <td scope="row">KH.Eklas502@gmail.com</td>
                                                <td scope="row"><a href="#">Service 4</a></td>
                                                <td scope="row">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="add-userTable-btn">
                                                        <a href="addUser.html" class="edit-btn"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" class="del-btn"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

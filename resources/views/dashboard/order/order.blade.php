@extends('dashboard.layouts.master')

@section('title')
    Users
@endsection

@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Orders</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        <div class="row " data-aos="fade-up">
            <div class="col-md-12 ">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row pt-3">

                                <div class="col-md-10">
                                    <div class="table-left pb-4">
                                        <select class="rounded" id="bulkaction">
                                            <option value="#">Bluk Action</option>
                                            <option value="selectall">Select All</option>
                                            <option value="deleteall">Delete All</option>
                                        </select>
                                        <button class="apply-btn rounded">Apply</button>

                                        <select class="rounded">
                                            <option value="#">jun 3 2022</option>
                                            <option value="#">Bluk Action</option>
                                        </select>
                                        <select class="rounded" id="customars-ststus">
                                            <option value="registerCustomers">registered customers</option>
                                            <option value="unregiesteredCustomer">Unregiestered Action</option>
                                        </select>
                                        <select class="rounded" id="ordersType">
                                            <option value="#">All Orders type</option>
                                            <option value="pending">Pending</option>
                                            <option value="processing">Processing</option>
                                            <option value="complete">Complete</option>
                                        </select>
                                        <button class="filter-btn rounded">filter</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="table-left text-left">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-end my-0">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase fw-bold">
                                            <tr>
                                                <th scope="col"><input type="checkbox"></th>
                                                <th scope="col">Order</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>

                                        <tbody class="user-data">
                                            <tr>
                                                <td scope="row"><input type="checkbox"></td>
                                                <td scope="row">#260</td>
                                                <td scope="row"> <span></span> Jul 3 2022</td>
                                                <td scope="row" class="pendingPayment">Pending Payment</td>
                                                <td scope="row"><a href="#">$10.00</a></td>
                                            </tr>
                                            <tr>
                                                <td scope="row"><input type="checkbox"></td>
                                                <td scope="row">#260</td>
                                                <td scope="row">Jul 3 2022</td>
                                                <td scope="row" class="pendingPayment">Pending Payment</td>
                                                <td scope="row"><a href="#">$10.00</a></td>
                                            </tr>
                                            <tr>
                                                <td scope="row"><input type="checkbox"></td>
                                                <td scope="row">#260</td>
                                                <td scope="row">Jul 3 2022</td>
                                                <td scope="row" class="processingPayment">Processing</td>
                                                <td scope="row"><a href="#">$10.00</a></td>
                                            </tr>
                                            <tr>
                                                <td scope="row"><input type="checkbox"></td>
                                                <td scope="row">#260</td>
                                                <td scope="row">Jul 3 2022</td>
                                                <td scope="row" class="processingPayment">Processing</td>
                                                <td scope="row"><a href="#">$10.00</a></td>
                                            </tr>
                                            <tr>
                                                <td scope="row"><input type="checkbox"></td>
                                                <td scope="row">#260</td>
                                                <td scope="row">Jul 3 2022</td>
                                                <td scope="row" class="completePayment">Complete</td>
                                                <td scope="row"><a href="#">$10.00</a></td>
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

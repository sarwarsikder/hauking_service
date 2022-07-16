@extends('dashboard.layouts.master')

@section('title')
    Tax System
@endsection

@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;">Orders</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="texInsertTabel shadow bg-white py-4 px-3" data-aos="fade-up">
                    <table class="table " id="editableTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th class="text-nowrap">Country Code</th>
                                <th class="text-nowrap">State Code</th>
                                <th class="text-nowrap">POst Code / Zip</th>
                                <th class="text-nowrap">City</th>
                                <th class="text-nowrap">Rate %</th>
                                <th class="text-nowrap">Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr data-id="1">
                                <th><input type="checkbox"></th>
                                <td data-field="text">US</td>
                                <td data-field="text">MO</td>
                                <td data-field="number">6271</td>
                                <td data-field="text">Rajshahi</td>
                                <td data-field="text">8.89997</td>
                                <td>
                                    <a class="button button-small edit" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a class="button button-small edit" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <th><input type="checkbox"></th>
                                <td data-field="text">US</td>
                                <td data-field="text">MO</td>
                                <td data-field="number">6271</td>
                                <td data-field="text">Rajshahi</td>
                                <td data-field="text">8.89997</td>
                                <td>
                                    <a class="button button-small edit" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a class="button button-small edit" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <th><input type="checkbox"></th>
                                <td data-field="text">US</td>
                                <td data-field="text">MO</td>
                                <td data-field="number">6271</td>
                                <td data-field="text">Rajshahi</td>
                                <td data-field="text">8.89997</td>
                                <td>
                                    <a class="button button-small edit" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a class="button button-small edit" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <th><input type="checkbox"></th>
                                <td data-field="text">US</td>
                                <td data-field="text">MO</td>
                                <td data-field="number">6271</td>
                                <td data-field="text">Rajshahi</td>
                                <td data-field="text">8.89997</td>
                                <td>
                                    <a class="button button-small edit" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <a class="button button-small edit" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tex-insert-btn">
                        <button class="pull-right add-row"><i class="bi bi-plus-circle"></i> Insert Row</button>
                        <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Save</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- </div> -->
    </div>
@endsection

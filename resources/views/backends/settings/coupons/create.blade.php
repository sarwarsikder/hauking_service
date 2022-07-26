@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">

                <form action="{{ route('coupons-submit') }}" method="POST">
                    @csrf
                    <div class="col-md-6 col-sm-12">
                        <div class="current-data shadow">
                            <h2>Add Coupon:</h2>
                            <table style="width:100%" class="current-data-table">
                                <tr>
                                    <th>Coupon Name:</th>
                                    <td><input type="text" name="coupon_name" value=""></td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td>
                                        <select name="coupon_type" id="">
                                            <option value="percent">Percent</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="days">Days</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Value:</th>
                                    <td>
                                        <input type="number" name="coupon_value" value="">
                                    </td>
                                </tr>
                                <th>Status:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="status">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                </tr>
                            </table>
                            <div class="tex-insert-btn mt-3">
                                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

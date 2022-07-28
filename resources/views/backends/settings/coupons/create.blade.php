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
                                    <td>
                                        @error('coupon_name')
                                            {{-- <div class="alert"> --}}
                                                <p class="text-danger">{{ $message }}</p>
                                            {{-- </div> --}}
                                        @enderror
                                        
                                        <input type="text" name="coupon_name"
                                            class="@error('coupon_name') is-invalid @enderror"
                                            value="{{ old('coupon_name') }}">

                                    </td>

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
                                        @error('coupon_value')
                                        {{-- <div class="alert"> --}}
                                            <p class="text-danger">{{ $message }}</p>
                                        {{-- </div> --}}
                                    @enderror
                                        <input type="number" class="@error('coupon_value') is-invalid @enderror" name="coupon_value" value="{{ old('coupon_value') }}">
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

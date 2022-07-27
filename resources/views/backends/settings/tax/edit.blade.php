@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-2 col-sm-2">
                <h4 style="margin-bottom: 0;"> Edit Tax</h4>
            </div>
            <div class="col-md-10 col-sm-10"></div>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-md-8 ">
                @if (session('redirect-message'))
                    <div class="alert alert-danger">
                        {{ session('redirect-message') }}
                    </div>
                @endif
                <div class="user-data-setting shadow ">
                    <form class="row g-3 adduserform" action="{{ route('taxes-update', $tax_service->id) }}" method="post">
                        @csrf
                        <div class="col-12">
                            <select class="form-control" name="tax_type">
                                <option value="local" {{ $tax_service->tax_type === 'local' ? 'selected' : '' }}>local
                                </option>
                                <option value="global" {{ $tax_service->tax_type === 'global' ? 'selected' : '' }}>global
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none" id="country" name="country">
                                <option>Select Your Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $tax_service->country_id == $country->id ? 'selected' : '' }}>
                                        {{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none" id="state" name="state"
                                value="{{ old('country') }}">
                                <option>Select Your state</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control shadow-none" id="city" name="city"
                                value="{{ old('country') }}">
                                <option>Select Your City</option>

                            </select>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control shadow-none" placeholder="Post Code" name="post_code"
                                value="{{ $tax_service->post_code }}">
                            @error('post_code')
                                <div class="alert">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror

                        </div>
                        <div class="col-12">
                            <label for="tax_rate">Rate</label>
                            <input type="number" class="form-control shadow-none" name="tax_rate"
                                value="{{ $tax_service->tax_rate }}">
                        </div>
                        <div class="col-6">
                            <label class="switch">
                                <input type="checkbox" name="status">
                                <span class="slider round"></span>
                            </label>
                        </div>


                        <div class=" text-center user-data-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-4 add-user-card ">

            </div>
        </div>
    </div>
    @push('css-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @endpush
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        $(function() {
            $('#country').change(function() {
                var country_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/admin/settings/taxes/getState',
                    data: {
                        country_id: country_id,
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state').html('<option value="">Select Your state</option>');
                        $.each(result, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' +
                                value.state_name + '</option>');
                        })
                        $('#city').html('<option value="">Select state First</option>');
                    },
                    error: function(err) {
                        toastr.error(data.message);
                    }
                });
            });

            $('#state').change(function() {
                var state_id = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: '/admin/settings/taxes/getCity/',
                    data: {
                        state_id: state_id,
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city').html('<option value="">Select Your city</option>');
                        $.each(result, function(key, value) {
                            $('#city').append('<option value="' + value.id + '">' +
                                value.city_name + '</option>');
                        })
                        // $('#city').html('<option value="">Select state First</option>');
                    },
                    error: function(err) {
                        toastr.error(data.message);
                    }
                });
            });


        });
    </script>
@endsection
@endsection

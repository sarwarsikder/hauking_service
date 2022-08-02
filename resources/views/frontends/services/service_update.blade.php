@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Service Name</h1>
    </div>
    <section id="field-for-cars">
        <div class="wrapper">
            <div class="row gy-sm-4 gx-lg-5 row-cols-1 row-cols-md-2">
                <div class="col align-self-center">
                    <img class="img-fluid" src="@if($service['service']->service_image_url) {{asset('/images/services/'.$service['service']->service_image_url)}} @else {{asset('assets/frontend/img/img-2.png')}} @endif">
                </div>
                <div class="col align-self-center">
                    <h1 class="fw-normal text-success">{{$service['service']->service_name}}</h1>
                    <h4 class="fw-normal mb-5">Subscription: <span class="fw-bold text-success">{{$service->status}}</span></h4>
                    <div class="mb-5">
                    @foreach(@json_decode($service->data_fields) as $k=>$v)
                        <h5 class="fw-normal">{{$v->name}} | <span class="fw-bold text-success">{{$v->userValue}}</span></h5>
                    @endforeach
                        
                        <h5 class="fw-normal">Day Mode | <span class="fw-bold text-success">{{json_decode($service->default_value_day)->day_time }} / {{json_decode($service->default_value_day)->value }}</span></h5>
                        <h5 class="fw-normal">Night Mode | <span class="fw-bold text-success">{{json_decode($service->default_value_night)->day_time }} / {{json_decode($service->default_value_night)->value }}</span></h5>
                        <h5 class="fw-normal">Booster Time | <span class="fw-bold text-success">{{json_decode($service->default_value_booster)->day_time }} / {{json_decode($service->default_value_booster)->value }}</span></h5>
                        <h5 class="fw-normal">Special Frequency | <span class="fw-bold text-success">{{json_decode($service->default_special_feq)}}</span>
                        </h5>
                    </div>
                    <a class="btn btn-success border rounded-0" role="button">CONTACT CUSTOMER SUPPORT</a>
                </div>
            </div>
        </div>
    </section>
    <section id="entry-form">
        <div class="wrapper">
            <form action="{{URL::to('service-update/'.$service->id)}}" method="post">
            @csrf    
            <div class="row gy-4 row-cols-1 row-cols-lg-2">
                    <div class="col d-flex flex-column flex-sm-column flex-lg-row align-items-lg-center"><label
                            class="form-label">Current Hawkins Value</label>
                        <div class="d-flex align-items-center slidecontainer">
                            <div class="flex-grow-1 me-2"><input id="myRange" class="slider" type="range" min="0"
                                                                 max="1000" value="{{json_decode($service->hawkin_scale)[0]}}" step="100"/></div>
                            <div><input class="border rounded-0 form-control text-center" name="hawkin_scale" type="text" id="quantity"
                                        size="4" readonly="" value="500"></div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">My
                            Timezone</label>
                            <select class="form-select rounded-0">
                            @foreach($timezones as $k=>$v)
                                    <option value="{{$v->value}}">{{$v->label}}</option>
                            @endforeach
                        </select></div>
                </div>
                <div class="row gy-4 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-center"><label class="form-label">Hawkins Booster</label><label
                            class="toggle-track">
                            <input type="checkbox" onclick="checkHawkinsBooster(this)"/>
                            <span class="toggle-button"></span>
                        </label></div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">Booster
                            Time</label>
                            <select id="default_value_booster_time"
                                    class="form-select rounded-0"
                                    name="default_value_booster_time" id="defaultValueBoosterTime">
                                    <option value="8PM"
                                        {{ @json_decode($service->default_value_booster)->day_time == "8PM" ? "selected" : "" }}>8:00 PM
                                    </option>
                                    <option value="10PM"
                                        {{ @json_decode($service->default_value_booster)->day_time == "10PM" ? "selected" : "" }}>10:00 PM
                                    </option>
                                    <option value="11PM"
                                        {{ @json_decode($service->default_value_booster)->day_time == "11PM" ? "selected" : "" }}>11:00 PM
                                    </option>
                            </select>
                    </div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">Booster
                            Value</label>
                            <select id="default_value_booster_value"
                                    class="form-select rounded-0"
                                    name="default_value_booster_value" id="defaultValueBoosterValue">
                                    <option value="900"
                                        {{ @json_decode($service->default_value_booster)->value == 1000 ? "selected" : "" }}>900</option>
                                    <option value="1000"
                                        {{ @json_decode($service->default_value_booster)->value == 1000 ? "selected" : "" }}>1000</option>
                                    <option value="1100"
                                        {{ @json_decode($service->default_value_booster)->value == 1100 ? "selected" : "" }}>1100</option>
                                    <option value="1200"
                                        {{ @json_decode($service->default_value_booster)->value == 1200 ? "selected" : "" }}>1200</option>
                            </select>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-12 col-lg-4 d-flex align-items-center"><label class="form-label">Day &amp; Night
                            Mode</label><i class="fas fa-sun fs-2 text-muted mode me-2"></i><i
                            class="fas fa-moon fs-3 text-muted mode active"></i></div>
                    <div class="col-12 col-lg-8 d-flex flex-column">
                        <div class="row border-0 p-0 mb-2">
                            <div class="col-12 col-lg-3"><label class="col-form-label">Day Time</label></div>
                            <div class="col-12 col-lg-9 d-flex flex-column flex-nowrap flex-lg-row">
                            <select id="default_value_day_time"
                                    class="form-select rounded-0"
                                    name="default_value_day_time" id="defaultValueDayTime">
                                    <option value="8PM"
                                        {{ @json_decode($service->default_value_day)->day_time == "8PM" ? "selected" : "" }}>8:00 PM
                                    </option>
                                    <option value="10PM"
                                        {{ @json_decode($service->default_value_day)->day_time == "10PM" ? "selected" : "" }}>10:00 PM
                                    </option>
                                    <option value="11PM"
                                        {{ @json_decode($service->default_value_day)->day_time == "11PM" ? "selected" : "" }}>11:00 PM
                                    </option>
                            </select>
                            <select id="default_value_day_value"
                                    class="form-select rounded-0"
                                    name="default_value_day_value" id="defaultValueDayValue">
                                    <option value="900"
                                        {{ @json_decode($service->default_value_day)->value == 1000 ? "selected" : "" }}>900</option>
                                    <option value="1000"
                                        {{ @json_decode($service->default_value_day)->value == 1000 ? "selected" : "" }}>1000</option>
                                    <option value="1100"
                                        {{ @json_decode($service->default_value_day)->value == 1100 ? "selected" : "" }}>1100</option>
                                    <option value="1200"
                                        {{ @json_decode($service->default_value_day)->value == 1200 ? "selected" : "" }}>1200</option>
                            </select>
                        </div>
                        <div class="row border-0 p-0" style="padding-top:14px !important">
                            <div class="col-12 col-lg-3"><label class="col-form-label">Night Time<br></label></div>
                            <div class="col-12 col-lg-9 d-flex flex-column flex-nowrap flex-lg-row">
                            <select id="default_value_night_time"
                                    class="form-select rounded-0"
                                    name="default_value_night_time" id="defaultValueNightTime">
                                    <option value="8PM"
                                        {{ @json_decode($service->default_value_night)->day_time == "8PM" ? "selected" : "" }}>8:00 PM
                                    </option>
                                    <option value="10PM"
                                        {{ @json_decode($service->default_value_night)->day_time == "10PM" ? "selected" : "" }}>10:00 PM
                                    </option>
                                    <option value="11PM"
                                        {{ @json_decode($service->default_value_night)->day_time == "11PM" ? "selected" : "" }}>11:00 PM
                                    </option>
                            </select>
                            <select id="default_value_night_value"
                                    class="form-select rounded-0"
                                    name="default_value_night_value" id="defaultValueNightValue">
                                    <option value="900"
                                        {{ @json_decode($service->default_value_night)->value == 1000 ? "selected" : "" }}>900</option>
                                    <option value="1000"
                                        {{ @json_decode($service->default_value_night)->value == 1000 ? "selected" : "" }}>1000</option>
                                    <option value="1100"
                                        {{ @json_decode($service->default_value_night)->value == 1100 ? "selected" : "" }}>1100</option>
                                    <option value="1200"
                                        {{ @json_decode($service->default_value_night)->value == 1200 ? "selected" : "" }}>1200</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row gy-4 row-cols-1 row-cols-lg-2">
                    <div class="col d-flex align-items-center">
                        <label class="form-label">Special Frequency</label><label class="toggle-track">
                            <input type="checkbox" onclick="checkSpecialFrequency(this)"/>
                            <span class="toggle-button"></span>
                        </label>
                    </div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">Special
                            Frequency</label>
                            <select id="default_special_feq"
                                    class="form-select rounded-0"
                                    name="default_special_feq" id="defaultSpecialFeq">
                                    @foreach($frequency as $k=>$v)
                                    <option value="{{$v->frequency_name}}"
                                        {{ json_decode($service->default_special_feq) == $v->frequency_name ? "selected" : "" }}>{{$v->frequency_name}}</option>
                                    @endforeach
                            </select>
                    </div>
                </div>
                <input class="btn btn-success border rounded-1 login-button" type="submit" value="Update">
            </form>
        </div>
    </section>
@endsection

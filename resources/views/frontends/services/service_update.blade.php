@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Service Name</h1>
    </div>
    <section id="field-for-cars">
        <div class="wrapper">
            <div class="row gy-sm-4 gx-lg-5 row-cols-1 row-cols-md-2">
                <div class="col align-self-center">
                    <img class="img-fluid" src="{{asset('assets/frontend/img/img-2.png')}}">
                </div>
                <div class="col align-self-center">
                    <h1 class="fw-normal text-success">The Field for CARS</h1>
                    <h4 class="fw-normal mb-5">Subscription: <span class="fw-bold text-success">Active</span></h4>
                    <div class="mb-5">
                        <h5 class="fw-normal">Car Brand | <span class="fw-bold text-success">Toyota</span></h5>
                        <h5 class="fw-normal">Model | <span class="fw-bold text-success">BZX4</span></h5>
                        <h5 class="fw-normal">VIN/Unique Motor Number | <span class="fw-bold text-success">9X4</span>
                        </h5>
                        <h5 class="fw-normal">Day/Night Mode | <span class="fw-bold text-success">Off</span></h5>
                        <h5 class="fw-normal">Booster Time | <span class="fw-bold text-success">On</span></h5>
                        <h5 class="fw-normal">Special Frequency | <span class="fw-bold text-success">Inner Peace</span>
                        </h5>
                    </div>
                    <a class="btn btn-success border rounded-0" role="button">CONTACT CUSTOMER SUPPORT</a>
                </div>
            </div>
        </div>
    </section>
    <section id="entry-form">
        <div class="wrapper">
            <form>
                <div class="row gy-4 row-cols-1 row-cols-lg-2">
                    <div class="col d-flex flex-column flex-sm-column flex-lg-row align-items-lg-center"><label
                            class="form-label">Current Hawkins Value</label>
                        <div class="d-flex align-items-center slidecontainer">
                            <div class="flex-grow-1 me-2"><input id="myRange" class="slider" type="range" min="0"
                                                                 max="1000" value="500" step="100"/></div>
                            <div><input class="border rounded-0 form-control text-center" type="text" id="quantity"
                                        size="4" readonly="" value="500"></div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">My
                            Timezone</label><select class="form-select rounded-0">
                            <option value="12" selected="">This is item 1</option>
                            <option value="13">This is item 2</option>
                            <option value="14">This is item 3</option>
                        </select></div>
                </div>
                <div class="row gy-4 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-center"><label class="form-label">Hawkins Booster</label><label
                            class="toggle-track">
                            <input type="checkbox" onclick="checkHawkinsBooster(this)"/>
                            <span class="toggle-button"></span>
                        </label></div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">Booster
                            Time</label><select class="form-select rounded-0" id="booster-time" disabled="">
                            <option value="12" selected="">This is item 1</option>
                            <option value="13">This is item 2</option>
                            <option value="14">This is item 3</option>
                        </select></div>
                    <div class="col d-flex flex-column flex-lg-row align-items-lg-center"><label class="form-label">Booster
                            Value</label><select class="form-select rounded-0" id="booster-value" disabled="">
                            <option value="12" selected="">This is item 1</option>
                            <option value="13">This is item 2</option>
                            <option value="14">This is item 3</option>
                        </select></div>
                </div>
                <div class="row gy-4">
                    <div class="col-12 col-lg-4 d-flex align-items-center"><label class="form-label">Day &amp; Night
                            Mode</label><i class="fas fa-sun fs-2 text-muted mode me-2"></i><i
                            class="fas fa-moon fs-3 text-muted mode active"></i></div>
                    <div class="col-12 col-lg-8 d-flex flex-column">
                        <div class="row border-0 p-0 mb-2">
                            <div class="col-12 col-lg-3"><label class="col-form-label">Day Time</label></div>
                            <div class="col-12 col-lg-9 d-flex flex-column flex-nowrap flex-lg-row"><input
                                    class="border rounded-0 form-control me-lg-2" type="time"><input
                                    class="border rounded-0 form-control me-lg-2" type="time"></div>
                        </div>
                        <div class="row border-0 p-0">
                            <div class="col-12 col-lg-3"><label class="col-form-label">Night Time<br></label></div>
                            <div class="col-12 col-lg-9 d-flex flex-column flex-nowrap flex-lg-row"><input
                                    class="border rounded-0 form-control me-lg-2" type="time"><input
                                    class="border rounded-0 form-control me-lg-2" type="time"></div>
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
                            Frequency</label><select class="form-select rounded-0" id="special-frequency" disabled="">
                            <option value="12" selected="">This is item 1</option>
                            <option value="13">This is item 2</option>
                            <option value="14">This is item 3</option>
                        </select></div>
                </div>
                <input class="btn btn-success border rounded-1 login-button" type="submit" value="Update">
            </form>
        </div>
    </section>
@endsection

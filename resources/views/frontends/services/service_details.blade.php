@extends('layouts.frontend_master')
@section('content')
<div id="hero-img" class="mt-3">
    <h1>Service Name</h1>
</div>
<section id="field-for-cars">
    <div class="wrapper">
        <div class="row gy-sm-4 gx-lg-5 row-cols-1 row-cols-md-2">
            <div class="col align-self-center">
                <img class="img-fluid" src="@if($service->service_image_url) {{asset('/images/services/'.$service->service_image_url)}} @else {{asset('assets/frontend/img/img-2.png')}} @endif">
            </div>
            <form class="row g-3 subscribeServiceForm" action="{{URL::to('service/'.$service->id)}}" method="post">
            @csrf
                <div class="col align-self-center">
                    <h1 class="fw-normal text-success">{{$service->service_name}}</h1>
                    <h4 class="fw-normal mb-5">From ${{json_decode($service->subscription_type)[0]->amount}} /
                        {{json_decode($service->subscription_type)[0]->duration}} Month</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, </p>
                    <div class="mb-5">
                        <div id="login-form-input">
                            <div class="col align-items-center">
                                <select name="subscription_type" id="subscriptionType" required>
                                    <option value="">Subscription Type</option>
                                    @foreach(json_decode($service->subscription_type) as $k=>$v)
                                    <option
                                        value='{{json_encode(array("amount" => $v->amount, "duration"=> $v->duration))}}'>
                                        ${{$v->amount}} / {{$v->duration}} Month</option>
                                    @endforeach
                                </select>
                                @foreach(json_decode($service->data_fields) as $k=>$v)
                                @if($v->type=="select")
                                <select id="inputVal{{$v->id}}" name="{{$v->id}}" @if($v->dataType=="required") required @endif onChange="getUserValue({{$v->id}})">
                                    <option value="">Select {{$v->name}}</option>
                                    @foreach(explode (",", $v->value) as $m=>$n)
                                    <option value="{{str_replace(' ', '', $n)}}">{{str_replace(' ', '', $n)}}</option>
                                    @endforeach
                                </select>
                                @else
                                    <input type="{{$v->type}}" name="{{$v->id}}" id="inputVal{{$v->id}}" placeholder="{{$v->name}}" oninput="getUserValue({{$v->id}})" @if($v->dataType=="required") required @endif/>
                                @endif

                                @endforeach
                                <select name="hawkin_scale[]" id="hawkin_scale" required>
                                    <option value="">Hawkins-Scale</option>
                                    @foreach(json_decode($service->hawkin_scale) as $k=>$v)
                                        @if(strpos($v,'Lock_')===false)
                                            <option value="{{$v}}" @if(in_array("Lock_".$v,json_decode($service->hawkin_scale))) disabled @endif>{{$v}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="hidden" name="data_fields" value="{{$service->data_fields}}" id="user_data_fields" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success border rounded-0">Subscribe Now</button>
                    <!-- <a href="{{route('service-checkout')}}" class="btn btn-success border rounded-0" role="button">Subscribe
                        Now</a> -->
                </div>
            </form>
        </div>
    </div>
</section>
<section id="entry-form">
    <div class="wrapper">
        <h2 class="fw-normal text-success">Description</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates pariatur exercitationem culpa aut,
            qui dolores ea ex debitis fugit autem odit sit cum illo quidem id voluptatum repellendus ut earum
            repudiandae. Quos odit doloremque sequi distinctio cupiditate deleniti, alias, dignissimos consequatur
            debitis perferendis illum? Harum quaerat libero consequuntur voluptatum similique natus provident
            officia nesciunt animi deserunt pariatur laborum quo nostrum, dolor rerum voluptates ipsum iusto eaque
            saepe ducimus? Numquam consectetur ratione ex odio accusantium voluptatibus neque temporibus? Quod
            assumenda facere ex maxime reprehenderit voluptatem perspiciatis nobis natus sunt omnis? Exercitationem
            voluptates, quia natus, blanditiis maxime tempore accusantium quasi laboriosam vero maiores eveniet
            corporis voluptatum minus ab aperiam totam ducimus a incidunt suscipit! Saepe perspiciatis alias harum
            incidunt cum eaque minima magnam quo quasi laboriosam laborum magni odit, fuga enim, fugiat, natus quas
            hic eligendi esse perferendis id provident nostrum? Labore est reprehenderit nobis voluptatum fugiat
            odit quasi incidunt. Minima rem dignissimos tenetur iure porro consectetur quia impedit iste incidunt?
            Debitis voluptatum distinctio eveniet amet, impedit numquam quidem ipsa obcaecati eos corporis, optio
            odit excepturi mollitia officiis libero nostrum dignissimos similique quasi. Neque perferendis
            consequatur dolores provident tempora necessitatibus repellendus, expedita rerum repudiandae labore ad
            laborum id blanditiis tenetur harum magnam laboriosam repellat veniam quisquam. Tempora, nemo voluptate
            tempore, sed ab dolorem dolorum aut provident voluptatibus ducimus quam ea fuga incidunt voluptas
            impedit minima placeat quod, recusandae cupiditate praesentium? Veritatis est accusantium nisi ut
            exercitationem modi harum delectus architecto tempore cupiditate dignissimos, enim non vero illo debitis
            ipsam quis eius nulla.</p>
    </div>
</section>

@section('scripts')
<script>
    let subscriptionInputValue = [];
    let dataFieldStringyfyValue = "";
    let subscriptionExistingValue = $("#user_data_fields").val();
    if(subscriptionExistingValue){
            subscriptionInputValue = JSON.parse(subscriptionExistingValue);
            let userValueInput=[];
            subscriptionInputValue.forEach(element => {
                if(!element.userValue){
                    let obj = element;
                    obj.userValue="";
                    userValueInput.push(obj)
                }else{
                    userValueInput.push(element)
                }
            });
            $("#user_data_fields").val(JSON.stringify(userValueInput));
    }

    function getUserValue(id){
    console.log(id)

    const object = subscriptionInputValue.find(obj => obj.id === id);
    const index = subscriptionInputValue.findIndex(entry => entry.id === id);
    const source = object
    source.userValue = $("#inputVal"+id).val();   
    

    subscriptionInputValue[index] = source
    dataFieldStringyfyValue = JSON.stringify(subscriptionInputValue)
    $("#user_data_fields").val(dataFieldStringyfyValue);
  }
 
    
</script>
@endsection
@endsection

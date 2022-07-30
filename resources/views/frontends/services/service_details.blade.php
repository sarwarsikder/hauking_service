@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>Service Name</h1>
    </div>
    <section id="field-for-cars">
        <div class="wrapper">
            <div class="row gy-sm-4 gx-lg-5 row-cols-1 row-cols-md-2">
                <div class="col align-self-center">
                    <img class="img-fluid" src="assets/img/img-2.png">
                </div>
                <div class="col align-self-center">
                    <h1 class="fw-normal text-success">The Field for CARS</h1>
                    <h4 class="fw-normal mb-5">From $100 / Month</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, </p>
                    <div class="mb-5">
                        <div id="login-form-input">
                            <div class="col align-items-center">
                                <select name="" id="">
                                    <option value="">Subscription Type</option>
                                    <option value="1">Monthly</option>
                                    <option value="12">Yearly</option>
                                </select>
                                <input type="text" placeholder="Car Brand"/>
                                <input type="text" placeholder="Model of Car"/>
                                <input type="text" placeholder="VIN/ Motor Vehicle Number"/>
                                <select name="" id="">
                                    <option value="">Hawkins-Scale</option>
                                    <option value="500">500</option>
                                    <option value="600">600</option>
                                    <option value="700">700</option>
                                    <option value="800">800</option>
                                    <option value="900">900</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('service-checkout')}}" class="btn btn-success border rounded-0" role="button">Subscribe
                        Now</a>
                </div>
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
@endsection

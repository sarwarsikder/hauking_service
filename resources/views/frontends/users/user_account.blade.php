@extends('layouts.frontend_master')
@section('content')
    <div id="hero-img" class="mt-3">
        <h1>My Account</h1>
    </div>

    <section id="checkout-form" class="mt-5">

        <div class="row col-12">
            <div class="tab col-3">
                <button class="tablinks" onclick="myAccount(event, 'Welcome')">Welcome</button>
                <button class="tablinks" onclick="myAccount(event, 'Profile')">Profile</button>
                <button class="tablinks" onclick="myAccount(event, 'Subscriptons')">Subscriptons</button>
                <button class="tablinks" onclick="myAccount(event, 'Transactions')">Transactions</button>
                <button class="tablinks" onclick="myAccount(event, 'Payments')">Payments</button>
                <form action="{{route('user-logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="tablinks" onclick="myAccount(event, 'logout')">Log Out</button>
                </form>

            </div>
            <div id="Welcome" class="tabcontent col-9">
                <h3>Hello, [User First Name]</h3>
                <p>Summary</p>
            </div>

            <div id="Profile" class="tabcontent col-9">
                <h3>Profile Settings</h3>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 p-3">
                        <div class="user-data-setting">
                            <form class="row g-3 adduserform">
                                <div class="col-md-6">
                                    <input type="text" class="form-control shadow-none" id="firstName"
                                           placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control shadow-none" id="lastName"
                                           placeholder="Last Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-none" id="streetaddress"
                                           placeholder="Street Address">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-none" id="city"
                                           placeholder="Town/City">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-none" id="state" placeholder="State">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control shadow-none" id="zipcode"
                                    <input type="text" class="form-control shadow-none" id="zipcode"
                                           placeholder="Zipcode">
                                </div>
                                <div class="col-6">
                                    <select id="country" name="country">
                                        <option>Select Your Country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, Democratic Republic of the Congo</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Cote D'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curacao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and Mcdonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="XK">Kosovo</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthelemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="CS">Serbia and Montenegro</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.s.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control shadow-none" id="inputAddress2"
                                           placeholder="Phone">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control shadow-none" id="inputEmail4"
                                           placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control shadow-none" id="inputPassword"
                                           placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control shadow-none" id="confirmPassword"
                                           placeholder="Confirm Password">
                                </div>

                                <div class="col-md-6">
                                    <select name="timezone_offset" id="timezone-offset" class="span5">
                                        <option value="-12:00">Select timezone</option>
                                        <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                                        <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                                        <option value="-10:00">(GMT -10:00) Hawaii</option>
                                        <option value="-09:50">(GMT -9:30) Taiohae</option>
                                        <option value="-09:00">(GMT -9:00) Alaska</option>
                                        <option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                                        <option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                                        <option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City
                                        </option>
                                        <option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota,
                                            Lima
                                        </option>
                                        <option value="-04:50">(GMT -4:30) Caracas</option>
                                        <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz
                                        </option>
                                        <option value="-03:50">(GMT -3:30) Newfoundland</option>
                                        <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                        <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                                        <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                                        <option value="+00:00" selected="selected">(GMT) Western Europe Time, London,
                                            Lisbon, Casablanca
                                        </option>
                                        <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                        <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                                        <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg
                                        </option>
                                        <option value="+03:50">(GMT +3:30) Tehran</option>
                                        <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                        <option value="+04:50">(GMT +4:30) Kabul</option>
                                        <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent
                                        </option>
                                        <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                        <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                                        <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                        <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                                        <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                        <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                        <option value="+08:75">(GMT +8:45) Eucla</option>
                                        <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk
                                        </option>
                                        <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                                        <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok
                                        </option>
                                        <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                                        <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia
                                        </option>
                                        <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                                        <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka
                                        </option>
                                        <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                                        <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                                        <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <input type="file" class="form-control shadow-none" id="files"
                                           placeholder="Upload Image">
                                </div>

                                <div class=" text-center user-data-btn">
                                    <button type="submit" class="btn-site">Save</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div id="Subscriptons" class="tabcontent col-9">
                <h3>Subscriptons</h3>
                <div class="accordion mb-3" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                Service 1
                            </button>
                        </h2>
                        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <button type="button" class="btn sub-active">Active</button>
                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                        <button type="button" class="btn sub-disable">Canceled</button> -->
                                    </div>
                                    <div class="col-9">
                                        <p class="m-2"><strong><a href="">1st Data Field, Service 1</a></strong></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{route('account-service',1)}}" type="button" class="btn btn-default">View</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <button type="button" class="btn sub-active">Active</button>
                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                        <button type="button" class="btn sub-disable">Canceled</button> -->
                                    </div>
                                    <div class="col-9">
                                        <p class="m-2"><strong><a href="">1st Data Field, Service 1</a></strong></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{route('account-service',1)}}" type="button" class="btn btn-default">View</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <button type="button" class="btn sub-active">Active</button>
                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                        <button type="button" class="btn sub-disable">Canceled</button> -->
                                    </div>
                                    <div class="col-9">
                                        <p class="m-2"><strong><a href="">1st Data Field, Service 1</a></strong></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{route('account-service',1)}}" type="button" class="btn btn-default">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion mb-3" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-2">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                                Service 1
                            </button>
                        </h2>
                        <div id="collapse-2" class="accordion-collapse collapse show" aria-labelledby="heading-2"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <button type="button" class="btn sub-active">Active</button>
                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                        <button type="button" class="btn sub-disable">Canceled</button> -->
                                    </div>
                                    <div class="col-9">
                                        <p class="m-2"><strong><a href="">1st Data Field, Service 1</a></strong></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{route('account-service',1)}}" type="button" class="btn btn-default">View</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <button type="button" class="btn sub-active">Active</button>
                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                        <button type="button" class="btn sub-disable">Canceled</button> -->
                                    </div>
                                    <div class="col-9">
                                        <p class="m-2"><strong><a href="">1st Data Field, Service 1</a></strong></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{route('account-service',1)}}" type="button" class="btn btn-default">View</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-2">
                                        <button type="button" class="btn sub-active">Active</button>
                                        <!-- <button type="button" class="btn sub-hold">Hold</button>
                                        <button type="button" class="btn sub-disable">Canceled</button> -->
                                    </div>
                                    <div class="col-9">
                                        <p class="m-2"><strong><a href="">1st Data Field, Service 1</a></strong></p>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{route('account-service',1)}}" type="button" class="btn btn-default">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Transactions" class="tabcontent col-9">
                <h3>Transactions</h3>
                <div class="row " data-aos="fade-up">
                    <div class="col-md-12 ">
                        <div class="recentUser">
                            <div class="card shadow">
                                <div class="card-body">

                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-uppercase fw-bold">
                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                                </thead>

                                                <tbody class="user-data">
                                                <tr>
                                                    <td scope="row">#260</td>
                                                    <td scope="row"><span></span> Jul 13 2022</td>
                                                    <td scope="row" class="pendingPayment">Pending Payment</td>
                                                    <td scope="row"><a href="#">$10.00</a></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">#261</td>
                                                    <td scope="row">Jul 23 2022</td>
                                                    <td scope="row" class="pendingPayment">Pending Payment</td>
                                                    <td scope="row"><a href="#">$10.00</a></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">#262</td>
                                                    <td scope="row">Jul 31 2022</td>
                                                    <td scope="row" class="processingPayment">Processing</td>
                                                    <td scope="row"><a href="#">$10.00</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-12">
                                                <div class="table-left text-left">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination justify-content-end my-0">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                    <span aria-hidden="true">&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                                            </li>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Payments" class="tabcontent col-9">
                <h3>Payment Modes</h3>
                <div class="col-md-12">
                    <h5>Current payment mode</h5>
                    <div class="col-12 mb-4">
                        <div class="col-12">
                            <input type="checkbox" name="" id="" checked>
                            <span>Paypal</span>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="#">
                            <h5>Add a new payment mode</h5>
                            <div class="col-12">
                                <div class="col-12">
                                    <input type="checkbox" name="" id="">
                                    <span>Paypal</span>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="" id="">
                                    <span>Credit Card</span>
                                    <p>Pay with your credit card via Stripe.</p>
                                </div>
                                <p>Your personal data will only be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our <a href="">privacy
                                        policy</a> .
                                </p>
                                <input class="btn btn-success border rounded-1 login-button" type="submit"
                                       value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        tabshow = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabshow.length; i++) {
            if (tabshow[2]) {
                tabshow[2].style.display = "block";
            }
            tabshow[i].style.display = "none";
        }
        tabactive = document.getElementsByClassName("tablinks");
        for (i = 0; i < tabactive.length; i++) {
            if (tabactive[2]) {
                tabactive[2].classList.add("active");
            }

        }

        function myAccount(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endpush

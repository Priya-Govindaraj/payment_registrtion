<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel - Razorpay Payment Gateway </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <main class="py-4">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}"
                    role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            <section class="h-100 bg-dark">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card card-registration my-8">
                                <div class="row g-0">
                                    <div class="col-xl-6 d-none d-xl-block">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                            alt="Sample photo" class="img-fluid"
                                            style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card-body p-md-5 text-black">
                                            <h3 class="mb-5 text-uppercase">Student registration form</h3>
                                            <form id="registrationFor"action="/razorpay-payment" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="title">
                                                            Title</label>
                                                        <input type="text" id="title" name="title"
                                                            class="form-control form-control-lg" placeholder="Title" />

                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="inital">Initial</label>
                                                       <select class="form-control form-control-lg">
                                                        <option>Dr.</option>
                                                        <option>Mr.</option>
                                                        <option>Mrs.</option>
                                                        <option>Ms.</option>
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="name">
                                                            Name</label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control form-control-lg" />

                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="text" id="email" name="email"
                                                            class="form-control form-control-lg" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="address">MCI Number</label>
                                                <input type="text-area" id="address"
                                                    class="form-control form-control-lg" placeholder="Only if Doctor" />
                                            </div>
                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="address">Address</label>
                                                <textarea type="text" id="address"
                                                    class="form-control form-control-lg" ></textarea>
                                            </div>

                                            <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                                <h6 class="mb-0 me-4">User Type: </h6>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input class="form-check-input" type="radio"
                                                        name="user_type" id="user_type" value="Member" />
                                                    <label class="form-check-label" for="Member">Member</label>
                                                </div>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input class="form-check-input" type="radio"
                                                        name="user_type" id="user_type" value="Non-Member" />
                                                    <label class="form-check-label" for="Non-Member">Non-Member</label>
                                                </div>

                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input" type="radio"
                                                        name="user_type" id="user_type" value="Student" />
                                                    <label class="form-check-label" for="Student">Student</label>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6 mb-2 mr-2">
                                                    <label class="form-label" for="state">State</label>
                                                    <select class="select p-2">
                                                        <option>Select State</option>
                                                        @foreach($states as $state)

                                                        <option value={{ $state->id }}>{{ $state->state_name }}</option>

                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-6 mb-2 ">
                                                    <label class="form-label" for="address">City/District</label>
                                                    <select class="select p-2">
                                                        <option>Select City</option>
                                                        @foreach($cities as $city)

                                                        <option value={{ $city->id }}>{{ $city->name }}</option>

                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="pincode">Pincode</label>
                                                <input type="text" id="pincode"
                                                    class="form-control form-control-lg" />

                                            </div>
                                            <div class="d-flex justify-content-end pt-3">
                                                <button type="button" class="btn btn-light btn-lg">Reset all</button>
                                                <button type="button" class="btn btn-warning btn-lg ms-2">Submit
                                                    form</button>
                                            </div>
                                        </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                $(document).ready(function() {
                    $("#registrationForm").submit(function(event) {
                        event.preventDefault();
                        var name = $("#name").val();
                        var email = $("#email").val();
                        var mciNo = $("#mciNo").val();
                        var address = $("#address").val();
                        var city = $("#city").val();
                        var district = $("#district").val();
                        var pincode = $("#pincode").val();
                        var userType = $("input[name='userType']:checked").val();
                        var amount = 0;
                        if (userType == "student") {
                            amount = 1000;
                        } else if (userType == "Member") {
                            amount = 2000;
                        } else {
                            amount = 3000;
                        }
                        var options = {

                            "key": "rzp_live_jkogUfHU4qmjbj",

                            "name": "Registration Fee",
                            "description": "Registration Fee for " + name,
                            "amount":amount *100,
                            "image": "https://yourdomain.com/logo.png",
                            "handler": function(response) {
                                var paymentId = response.razorpay_payment_id;
                                var formData = new FormData();
                                formData.append("name", name);
                                formData.append("email", email);
                                formData.append("mciNo", mci);
                                formData.append("address", address);
                                formData.append("city", city);
                                formData.append("district", district);
                                formData.append("pincode", pincode);
                                formData.append("userType", userType);
                                formData.append("amount", amount * 100);
                                formData.append("paymentId", paymentId);
                                $.ajax({
                                    url: "register.php",
                                    method: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        if (response == "success") {
                                            alert("Registration successful");
                                        } else {
                                            alert("Registration failed");
                                        }
                                        location.reload();
                                    }
                                });
                            },
                            "prefill": {
                                "name": name,
                                "email": email,
                            },
                            "notes": {
                                "address": address,
                                "city": city,
                                "district": district,
                                "pincode": pincode,
                                "userType": userType
                            },
                            "theme": {
                                "color": "#F37254"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    });
                });
            </script>
        </main>
    </div>
</body>

</html>

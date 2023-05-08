<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <div id="app">
        <main class="py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">

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

                        <div class="card card-default">
                            <div class="card-header">

                                Registration Form
                            </div>
                            <div class="card-body text-center">
                                <form id="registrationForm"action="/register" method="POST">
                                    <div class="form-outline  text-justify">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline text-justify">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline text-justify">
                                        <label for="mciNo" class="form-label">MCI No:</label>
                                        <input type="text" id="mciNo" name="mciNo" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline  text-justify">
                                        <label for="address"class="form-label">Address:</label>
                                        <input type="text" id="address" name="address"class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline  text-justify">
                                        <label for="city" class="form-label">City:</label>
                                        <input type="text" id="city" name="city" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline  text-justify">
                                        <label for="district" class="form-label">District:</label>
                                        <input type="text" id="district" name="district"class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline  text-justify">
                                        <label for="pincode" class="form-label">Pincode:</label>
                                        <input type="text" id="pincode" name="pincode"class="form-control"
                                            required>
                                    </div>
                                    <div class="form-outline  text-justify">
                                        <label for="userType" class="form-label">User Type:</label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1"
                                                    name="userType" value="student" checked>
                                                <label class="form-check-label" for="radio1">Student - 1000</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2"
                                                    name="userType" value="Member" checked>
                                                <label class="form-check-label" for="radio1">Member - 2000</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio3"
                                                    name="userType" value="Non-member" checked>
                                                <label class="form-check-label" for="radio1">Non-member -
                                                    3000</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel - Razorpay Payment Gateway </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">

                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif

                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif

                        <div class="card card-default">
                            <div class="card-header">
                                Laravel - Razorpay Payment Gateway Integration
                            </div>

                            <div class="card-body text-center">
                                <form action="{{ route('razorpay.payment.store') }}" method="POST" >
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
                                    <div class="form-outline  text-justify">
                                        <label for="amount" class="form-label">Amount:</label>
                                        <input type="text" id="amount" name="amount"class="form-control"
                                            required>
                                    </div>

                                    @csrf
                                    <script id="razorpay-script" src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="100000"
                                            data-buttontext="Register"
                                            data-name="Adsdunia Private Limited"
                                            data-description="Rozerpay"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-prefil.contact="contact"
                                            data-theme.color="#B3BCF9">
                                    </script>
                                    <script>
                                        document.getElementById("amount").addEventListener("input", function() {
                                          var amount = document.getElementById("amount").value;
                                          document.getElementById("razorpay-script").setAttribute("data-amount", amount);
                                        });
                                        </script>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

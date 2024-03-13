<!DOCTYPE html>
<html lang="en">

<head>
    <title>form handling</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <h2>Contact us</h2>
                <form action="contact" method="POST" id="validation">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" placeholder="message" rows="5">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="text-danger">{{ $message}}</div>
                        @enderror
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- 
    <script>
        $("#validation").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 20,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                message: {
                    required: true,
                    maxlength: 200,
                }

            },
            messages: {
                name: {
                    required: "Please enter your name",
                    maxlength: "Name cannot be more than 20 characters"
                },
                email: {
                    required: "please enter your email",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 30 characters",
                },
                message: {
                    required: "please enter your message",


                }

            },
        });
    </script> -->

</body>

</html>
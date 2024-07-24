<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body>
<!-- 404 page area starts -->
<section class="about--us--banner--area--wrapper banner--top--gap section--bottom--gap">
    <div class="container w-50">

        <div class="row  justify-content-center  ">
            <div class="w-auto  row justify-content-center">
                <div class="col col-lg-10 btn-fill ">
                    <img class="img-fluid"  src="{{asset('frontend/images/404.png')}}" alt="">
                </div>

            </div>
        </div>
        <div class=" d-flex justify-content-center btn--wrapper">
            <a href="{{route('frontend./')}}" class="btn--normal btn-fill btn  text-white bg-dark"> Back To Home</a>
        </div>
    </div>
</section>
<!-- 404 page area ends -->
</body>
</html>

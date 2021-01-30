<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>404 Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="{{ url('/css/islanderrorstyle.css') }}">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="not-found parallax">
            <div class="sky-bg"></div>
            <div class="wave-7"></div>
            <div class="wave-6"></div>
            <a class="wave-island" href="{{ url('/') }}">
                    <img src="http://res.cloudinary.com/andrewhani/image/upload/v1524501929/404/island.svg" alt="Island">
                </a>
            <div class="wave-5"></div>
            <div class="wave-lost wrp">
                <span>4</span>
                <span>0</span>
                <span>4</span>
            </div>
            <div class="wave-4"></div>
            <div class="wave-boat">
                <img class="boat" src="http://res.cloudinary.com/andrewhani/image/upload/v1524501894/404/boat.svg" alt="Boat">
            </div>
            <div class="wave-3"></div>
            <div class="wave-2"></div>
            <div class="wave-1"></div>
            <div class="wave-message">
                <p>Your're lost</p>
                <p>Click on the island to return</p>
            </div>
        </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script  src="{{ url('/js/script.js') }}"></script>

</body>
</html>
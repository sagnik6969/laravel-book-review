<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Book Review</title>
    <style>
        .container {
            max-width: 700px
        }

        .filter-container {
            background-color: rgb(241 245 249);
        }

        .flex-even {
            flex: 1;
        }

        .search-box {
            width: 40% !important;
            /* height: 100px; */
            /* background: red; */
            transition: width 600ms !important;
        }

        .search-box:hover {
            /* transform: scaleX(1.7); */
            width: 50% !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5 mb-2">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Todo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        input[type="radio"]:checked {
          border-color: rgb(33 99 235 / var(--tw-ring-opacity, 1));
          background-color: rgb(33 99 235 / var(--tw-ring-opacity, 1));;
        }
      
        input[type="radio"] {
          appearance: none; 
          width: 1rem; 
          height: 1rem;
          border: 2px solid #ccc;
          border-radius: 50%;
          outline: none;
          transition: background-color 0.3s, border-color 0.3s;
        }
      
        input[type="radio"]:hover {
          border-color: rgb(33 99 235 / var(--tw-ring-opacity, 1));;
        }
      </style>
</head>
<body class="dark:bg-gray-800">
    <x-navbar />
    <x-sidebar />
    @yield('content')
</body>
</html>
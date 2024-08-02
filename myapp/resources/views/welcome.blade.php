<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <style>
        .bg-image {
            background-image: url('Image/company.jpg');
            background-size: cover; /* Make the background image cover the entire container */
            background-position: center; /* Center the image within the container */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            height: 100vh; /* Set the height to 100% of the viewport height */
            width: 100%; /* Set the width to 100% of the container */
            display: flex; /* Flexbox to center content vertically */
            align-items: center; /* Center content vertically */
            justify-content: center; /* Center content horizontally */
        }
    </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('Userlayout.link')
        <title>Laravel</title>
        @include('Userlayout.header')
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    </head>
    <div class="bg-image">
        <div class="text-center text-white">
            <h1>Welcome to Our Company</h1>
            <p>Your success is our priority</p>
        </div>
    </div>
</body>
</html>

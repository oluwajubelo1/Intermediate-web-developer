<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet">

  <script src="{{ mix('/js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/934c9511a9.js"></script>

  <title>Inertia</title>
  @routes
</head>

<body class="bg-gray-200 text-gray-900">
  @inertia
</body>

</html>

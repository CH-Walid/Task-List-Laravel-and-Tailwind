<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> @yield('title', 'Task List') </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
  @if (session('success'))
    <div x-show="flash"
      class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
      role="alert">
      <strong class="font-bold">Success!</strong>
      <div>{{ session('success') }}</div>
    </div>
  @endif
  @yield('content')
</body>
</html>
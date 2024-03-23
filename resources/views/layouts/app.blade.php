<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> @yield('title', 'Task List') </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/tailwindcss">
    .h1 {
      @apply uppercase mb-4 text-2xl font-bold
    } 
    .btn {
      @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
    }

    .link {
      @apply font-medium text-gray-700 underline decoration-pink-500
    }

    .label {
      @apply block uppercase text-slate-700 mb-2
    }

    .input, 
    .textarea {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }

    .error {
      @apply text-red-500 text-sm
    }

    .checkbox {
      @apply w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600
    }
  </style>
</head>

<header class="mb-8">
  <nav class="flex items-align justify-between">
    <div>
      @guest
        @if(Route::currentRouteName() != 'auth.register')
          <a href="{{ route('auth.register') }}" class="link">Register</a>
        @endif
        @if(Route::currentRouteName() != 'login')
          <a href="{{ route('login') }}" class="link">Login</a>
        @endif
      @endguest
    </div>
    @auth
      <a href="{{ route('logout') }}" class="btn">Logout</a>
    @endauth
  </nav>
</header>

<body class="bg-gray-50 container mx-auto mt-10 mb-10 max-w-lg">
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
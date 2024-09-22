<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointment System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="flex items-center mt-6 justify-between m-10">

        <div class="space-x-4 font-semibold text-xl">
            <a href="/" class="rounded-lg p-4 bg-sky-800 border border-transparent hover:border-blue-950  hover:bg-sky-500">Home</a>
            <a href="{{ route('appointments.index') }}"  class="rounded-lg p-4 bg-sky-800 border border-transparent hover:border-blue-950 hover:bg-sky-500">Appointments</a>
            <a href="{{ route('appointments.create') }}"  class="rounded-lg p-4 bg-sky-800 border border-transparent hover:border-blue-950  hover:bg-sky-500">Book Appointment</a>
        </div>

        <div>
            @auth
            <div class="space-x-6 font-bold flex">
    
               <form action="/logout" method="POST">
                   @csrf
                   @method('DELETE')
                   <button class="rounded-lg bg-red-700 p-4">Log Out</button>
                   
                   </form>
            </div>
           @endauth
    
           @guest
           <div class="space-x-4 font-semibold mt-6 flex-end ml-9">
               <a href="/register" class="rounded-lg bg-amber-800 p-4 hover:bg-amber-500">Sign Up</a>
               <a href="/login" class="rounded-lg bg-slate-700 p-4 hover:bg-slate-400">Log In</a>
           </div>
           @endguest
        </div>

    </nav>
    
    <main>
        {{$slot}}
    </main>
</body>
</html>
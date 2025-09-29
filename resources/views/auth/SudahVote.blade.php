<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('/assets/font/font.css')}}">
    <link rel="stylesheet" href="{{asset('assets/mdi/css/materialdesignicons.css')}}">
    <style>
        .mdi-alert::before{
            animation: dim infinite 1000ms ease-in-out;
            
        }
        button{
            animation:dim infinite 1500ms ease-in-out ;
        }
        button:hover{
            animation: none;
        }
        @keyframes dim {
            0%, 100%{
                opacity: 1;
                transform: scale(1.1);
            }50%{
                transform: scale(1);
                opacity: 0.8;
            }
        }
    </style>
</head>
<body class="flex align-middle items-center justify-center">
    <div class="container flex flex-col gap-4 items-center justify-center h-[100vh]">
        <i class="mdi mdi-alert text-red-500 mdi-48px"></i>
        <h1 class="poppins-semibold text-[4rem] pb-0">Kamu Telah Vote</h1>
        <h3 class="poppins-medium text-[1.3rem]">Kamu vote pada mm:dd:yy</h3>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="px-6 py-2 bg-red-500 rounded-lg poppins-medium text-[#ebf1ff]" type="submit">Logout <i class=" mdi mdi-logout"></i></button>
        </form>
    </div>
    
</body>
</html>
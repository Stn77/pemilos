<div class="flex align-middle w-[100vw] m-auto h-[100vh]">
    <title>Login</title>
    <link rel="icon" href="/pilketos/public/img/web-img/LOGO PGRI 1.png" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <form action="{{route('login-submit')}}" method="post" 
    class=" flex-row align-middle justify-center px-10 m-auto border-gray-200 border-2 border-solid max-w-[500px] py-10 rounded-[10px]" 
    > 
        @csrf
        <p class="text-[2rem] font-semibold text-center w-[100%]">Login</p>

        <label for="nisn"
        >NISN</label>
        <input type="text" name="nisn" placeholder="nisn" autocomplete="off"
        class="w-[100%] h-[40px] border-solid border-[#cecece] border-2 rounded-[5px] p-[10px] my-5 focus:outline-gray-600 focus:border-gray-700 focus:scale-[1.02] focus:translate-y-[-3px] transition-all duration-200 ease-in">

        <label for="password"
        class=""
        >Password</label>
        <input type="text" name="password" placeholder="password" autocomplete="off"
        class="w-[100%] h-[40px] border-solid border-[#cecece] border-2 rounded-[5px] p-[10px] my-5 focus:outline-gray-600 focus:border-gray-700 focus:scale-[1.02] focus:translate-y-[-3px] transition-all duration-200 ease-in">

        <div class="btn flex align-middle justify-center mt-10">
            <button type="submit" 
            class="bg-[#4E4CFF] poppins-regular text-white outline-none py-2 px-10 text-center rounded-[5px] font-semibold"
            >Login</button>
        </div>
        <div class="exeption w-[100%] h-[31px]">
            @if(session('username'))
            <p
            class="font-serif text-red-600 alert w-[100%] align-middle text-center"
            >{{session('username')}}jjh</p>
            @elseif (session('message'))
            <p
            class="font-serif text-red-600 alert w-[100%] align-middle text-center"
            >{{session('message')}}</p>
            @endif
        </div>
    </form>

</div>

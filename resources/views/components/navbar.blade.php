<style>

</style>
<nav class="flex w-[100%] h-[70px] p-[20px] items-center justify-between  sticky top-0 bg-[#0080EC]"
style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;"
>
    <div class="flex items-center gap-2">
        <img class="w-[3rem] h-[3rem]" src="{{asset('assets/web-img/LOGO PGRI 1.png')}}" alt="">
        <p class="text-[2.2rem] m-0 text-[#ebf1ff] poppins-semibold">SMEGRIMA</p>
        {{-- <i>{{config(app.name)}}</i> --}}
    </div>
    
    <div class="nr">
        <a href="" class="mdi p-[10px] btn-hover hover:text-[#ebf1ff] cursor-pointer mdi-bell"></a>
        <a href="" class="mdi p-[10px] btn-hover hover:text-[#ebf1ff] cursor-pointer mdi-message-text-outline"></a>
        <i href="" class="mdi p-[10px] btn-hover hover:text-[#ebf1ff] cursor-pointer mdi-account" id="account"></i>
    </div>

    <div 
    class="absolute action right-[20px] top-[60px] bg-[#ebf1ff] p-[15px] flex-col items-center justify-center flex-wrap rounded-[5px] animate-moveAction duration-300 ease-in-out transition-all ease"
    id="profileAction" style="display: none;">
        <a
        class="px-[15px] py-[5px] text-[#2e3131] border-[#2e3131] bg-[#ebf1ff] cursor-pointer rounded-[5px] no-underline hover:text-[#0080ec] transition-all duration-200"
        href="" class="poppins-regular btn-active">Profile</a>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button
            class="px-[15px] py-[5px] text-[#2e3131] border-[#2e3131] bg-[#ebf1ff] cursor-pointer rounded-[5px] hover:text-[#0080ec] transition-all duration-200"
            type="submit btn-active">Logout</button>
        </form>
    </div>
</nav>
<script src="{{asset('assets/script/nav.js')}}"></script>
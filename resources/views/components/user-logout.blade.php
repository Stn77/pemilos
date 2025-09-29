<nav class="flex w-[100%] h-[70px] p-[20px] items-center justify-between  absolute top-0 bg-transparent">
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button
        class="mdi mdi-logout
        px-3 py-[5px] text-center before:text-gray-900 bg-[#ebf1ff] cursor-pointer rounded-[5px] hover:text-[#0080ec] transition-all duration-200 btn-active"
        type="submit btn-active"></button>
    </form>
</nav>
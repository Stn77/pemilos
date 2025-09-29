<style>

</style>
<div
class="flex fixed left-0 z-50 gap-[10px] py-[25px] px-[15px] pr-[-15px] rounded-e-lg bg-[#0080EC] translate-y-[-50%] transition"
id="sidebar" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
    <div 
    class="sidebar-btn-act flex-col w-[55px] align-middle items-center"
    >
        {{-- <i class="mdi btn-hover hover:text-[#ebf1ff] before:w-[50px] transition-all duration-200 flex no-underline text-center h-[50px] w-[50px] mdi-menu" id="menu"></i> --}}
        
        <a href="{{route('admin.dasboard')}}" 
        class="mdi btn-hover hover:text-[#ebf1ff] before:w-[50px] transition-all duration-200 flex no-underline text-center h-[50px] w-[50px] mdi-home" ></a>
        
        <a href="{{route("admin.dasboard.chart")}}" 
        class="mdi btn-hover hover:text-[#ebf1ff] before:w-[50px] transition-all duration-200 flex no-underline text-center h-[50px] w-[50px] mdi-chart-areaspline"></a>
        
        <a href="{{route('admin.dasboard.peserta')}}" 
        class="mdi btn-hover hover:text-[#ebf1ff] before:w-[50px] transition-all duration-200 flex no-underline text-center h-[50px] w-[50px] mdi-folder-account"></a>
        
        <a href="{{route('admin.dasboard.kandidat')}}" 
        class="mdi btn-hover hover:text-[#ebf1ff] before:w-[50px] transition-all duration-200 flex no-underline text-center h-[50px] w-[50px] mdi-account-multiple"></a>
    </div>
</div>

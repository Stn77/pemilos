<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="container bg-body">
            <div id="chart" class="max-w-[650px] my-[35px] mx-auto"></div>
            <button id="button">butin</button>
        </div>
        
        @push('scripts')
        <script>
            
                import ApexCharts from 'apexcharts'
         var options = {
          chart: {
            type: 'bar'
          },
          series: [{
            name: 'sales',
            data: [30,40,45,50,49,60,70,91,125]
          }],
          xaxis: {
            categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
          }
        }
        
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        
        chart.render();
              
        </script>
        @endpush
    </body>
</html>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>


<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

{{-- @livewireScripts --}}
<script src="{{ asset('/js/main.js') }}"></script>

<link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">

<script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script>
    $('#tanggal').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
            .format('YYYY-MM-DD'));
    });
</script>
{{-- {{ $script ?? ''}} --}}
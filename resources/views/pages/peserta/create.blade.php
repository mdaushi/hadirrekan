<x-app-layout>
    @push('add-styles')
    @endpush
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peserta</h3>
                <p class="text-subtitle text-muted">Manajemen Peserta.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Peserta</li>
                        <li class="breadcrumb-item active" aria-current="page">tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    {{-- section --}}
    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible show fade">
        {{$message}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Peserta</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="{{ route('peserta.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            @include('pages.peserta.form')
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @push('add-scripts')

        <script>
            $('#tanggal').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'DD/MM/YYYY'
                }
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        </script>
    @endpush
</x-app-layout>

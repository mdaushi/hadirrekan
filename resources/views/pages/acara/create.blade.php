<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Acara</h3>
                <p class="text-subtitle text-muted">Manajemen Acara.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Acara</li>
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
                <h4 class="card-title">Tambah Acara</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @include('pages.acara.form')
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

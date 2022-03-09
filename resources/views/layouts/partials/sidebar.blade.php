<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Acara" :link="route('acara.index')" icon="bi bi-calendar-event-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Sesi" :link="route('sesi.index')" icon="bi bi-person-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Peserta" :link="route('peserta.index')" icon="bi bi-person-fill"></x-maz-sidebar-item>

</x-maz-sidebar>
<x-app-layout>
    @push('add-styles')
        <script src="https://unpkg.com/vue@3"></script>
        <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">

    @endpush
    <x-slot name="header">
        <div class="">
            <div class="card">
                <div class="card-content">
                    <div class="card-body row">
                        <div class="col-md-6 col-12">
                            <fieldset class="form-group">
                                <label for="acara_id">Acara</label>
                                <select class="form-select" v-model="eventSelected" id="acara_id">
                                    <option disabled value="">Pilih Acara</option>
                                    <option v-for="event in events" :value="event.id">@{{event.name}}</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-6 col-12">
                            <fieldset class="form-group">
                                <label for="acara_id">Sesi</label>
                                <select class="form-select" v-model="sesiSelected" id="sesi_id">
                                    <option disabled value="">Pilih Sesi</option>
                                    <option v-for="item in sesi" :value="item.id">@{{item.nama}}</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <section id="app">
        <div class="row match-height">

            {{-- scan area --}}
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Presensi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <qrcode-scanner
                                :qrbox="250" 
                                :fps="10" 
                                style="width: 100%;"
                                v-if="eventSelected && sesiSelected"
                                @result="onScan"
                            />
                        </div>
                    </div>
                </div>
            </div>

            {{-- list presensi user --}}
            <div class="col-md-6 col-12">
                <div class="card">
                    {{-- <div class="card-header">
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Peserta yang hadir</h4>
                            <table class="table table-striped table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Peserta</th>
                                        <th>Asal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="peserta in pesertas">
                                        <td>@{{peserta.peserta.name}}</td>
                                        <td>@{{peserta.peserta.asal}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('add-scripts')
        <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
        {{-- <script src="{{ asset('js/extensions/toastify.js') }}"></script> --}}
        <script src="https://unpkg.com/html5-qrcode"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            const qrcodeScanner = {
                props: {
                    qrbox: {
                    type: Number,
                    default: 250
                    },
                    fps: {
                    type: Number,
                    default: 10
                    },
                },
                template: `<div id="qr-code-full-region"></div>`,
                mounted () {
                    const config = {
                    fps: this.fps,
                    qrbox: this.qrbox,
                    };
                    const html5QrcodeScanner = new Html5QrcodeScanner('qr-code-full-region', config);
                    html5QrcodeScanner.render(this.onScanSuccess);
                },
                methods: {
                    onScanSuccess (decodedText, decodedResult) {
                    this.$emit('result', decodedText, decodedResult);
                    }
                }
            }

            const vm = Vue.createApp({
                mounted () {
                    this.getEvents();
                },
                data() {
                    return {
                        message: 'Hello Vue!',
                        acara: '',
                        sesi: '',
                        events: [],
                        eventSelected: '',
                        sesi: [],
                        sesiSelected: '',
                        pesertas: []
                    }
                },
                methods: {
                    onScan(decodedText, decodedResult) {
                        axios.post('presensi', {
                            acara_id: this.eventSelected,
                            sesi_id: this.sesiSelected,
                            qr_code: decodedText
                        })
                        .then(function (response) {
                            if(response.data.status) {
                                Toastify({
                                    text: response.data.message,
                                    duration: 3000,
                                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                                }).showToast();
                            } else {
                                Toastify({
                                    text: response.data.message,
                                    duration: 3000,
                                    backgroundColor: "linear-gradient(to right, #cc6666, #ff8080)",
                                }).showToast();
                            }
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    },
                    getEvents() {
                        
                        axios.get('/acara/get')
                            .then(response => {
                                this.events = response.data;
                            })
                            .catch(error => {
                                console.log(error);
                            })
                    },
                    getSesi() {
                        axios.get('/sesi/get/' + this.eventSelected)
                            .then(response => {
                                this.sesi = response.data;
                            })
                            .catch(error => {
                                console.log(error);
                            })
                    },
                    getPresensi() {
                        axios.get('/presensi/get/' + this.eventSelected + '/' + this.sesiSelected)
                            .then(response => {
                                this.pesertas = response.data;
                            })
                            .catch(error => {
                                console.log(error);
                            })
                    }
                },
            })
            .component('qrcode-scanner', qrcodeScanner)
            .mount('#app');

            $('#acara_id').on('change', function() {
                vm.sesiSelected = '';
                vm.pesertas = [];
                vm.getSesi();
            });

            $('#sesi_id').on('change', function() {
                vm.getPresensi();
            });


            
        </script>
        
    @endpush
</x-app-layout>    

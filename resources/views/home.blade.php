@extends('layouts.main')

@section('content')

<div class="font-Quicksand">
    <header class="fixed inset-x-0 top-0 z-50 bg-primary">
        <nav class="flex items-center justify-between p-2 lg:px-8">
            <div class="flex lg:flex-1 items-center">
                <span class="ml-3 text-xl lg:text-2xl font-bold leading-6 text-white">TrashBiz</span>
            </div>

            <div class="flex lg:hidden">
                <button id="mobile-menu-button" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12 lg:mr-40">
                <a href="#Beranda" class="text-lg font-bold leading-6 text-white hover:text-teal-200">Beranda</a>
                <a href="#About" class="text-lg font-bold leading-6 text-white hover:text-teal-200">About</a>
                <a href="#Kontak" class="text-lg font-bold leading-6 text-white hover:text-teal-200">Kontak</a>
                <a href="#Pembelian" class="text-lg font-bold leading-6 text-white hover:text-teal-200">Beli Produk</a>
            </div>
        </nav>

        <div id="mobile-menu" class="hidden lg:hidden" role="dialog" aria-modal="true">

            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between bg-primary rounded-lg p-2">
                    <button id="close-menu-button" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#Beranda"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-primary hover:text-slate-100 text-center">Beranda</a>
                            <a href="#About"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-primary hover:text-slate-100 text-center">About</a>
                            <a href="#Kerajinan"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-primary hover:text-slate-100 text-center">Kerajinan</a>
                            <a href="#Kontak"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-primary hover:text-slate-100 text-center">Kontak</a>
                            <a href="#Pembelian" 
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-primary hover:text-slate-100 text-center">Beli Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="relative isolate px-6 pt-5 lg:px-8 bg-cover bg-center"
        style="background-image: url('{{ asset('images/header-bg.png') }}')" id="Beranda">
        <div class="absolute inset-0 bg-white/5 backdrop-blur-sm -z-10" aria-hidden="true"></div>
        <div
            class="mx-auto max-w-7xl py-32 sm:py-48 lg:py-56 flex flex-col lg:flex-row items-center lg:items-start justify-between">
            <div class="lg:w-1/2 text-left">

                <h1 class="text-xl md:text-2xl font-bold">TrashBiz (Solusi Digital Pengelolaan Bank Sampah)</h1>
                
                <p class="mt-6 lg:text-lg leading-8 text-gray-700 font-bold">
                    TrashBiz adalah platform bank sampah digital yang dirancang untuk memudahkan pengelolaan sampah secara 
                    efisien dan berkelanjutan. Platform ini memungkinkan nasabah untuk menyetor sampah, melihat saldo, 
                    dan memantau transaksi secara transparan melalui aplikasi. 
                </p>
                <div class="mt-10 flex items-center justify-start gap-x-6">
                    <a href="{{ route('login') }}"
                        class="rounded-md bg-primary px-3 py-2 md:px-6 md:py-3 text-sm font-bold text-slate-100 shadow-sm hover:bg-hijau">Login 
                        </a>
                    <a href="{{ route('register.nasabah') }}"
                        class="rounded-md bg-blue-600 px-3 py-2 md:px-6 md:py-3 text-sm font-bold text-slate-100 shadow-sm hover:bg-blue-500">Registrasi</a>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true"></div>
    </div>

    <section class="scroll-mt-28" id="About">
        <div class="flex justify-center mt-10" id="About">
            <div class="bg-primary px-12 py-2 rounded-lg">
                <h1 class="text-white font-bold text-lg">About</h1>
            </div>
        </div>
        <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8 container">
            <div class="text-center mb-10">
                <p class="lg:text-lg">
                    TrashBiz didirikan untuk memberikan solusi jangka panjang terhadap masalah sampah di masyarakat. 
                    Dengan pendekatan yang menyeluruh dan edukatif, kami berfokus pada peningkatan kesadaran dan partisipasi 
                    masyarakat dalam mengelola sampah. Kami yakin bahwa dengan bekerja sama dan berinovasi, kita bisa 
                    menciptakan lingkungan yang lebih bersih, sehat, dan bermanfaat bagi semua.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-6">
                <div class="bg-gray-100 shadow-xl overflow-hidden flex-1 border">
                    <div class="bg-primary p-1 border-2 border-green-700">
                        <h2 class="text-lg lg:text-2xl font-bold text-center text-white">
                            Visi
                        </h2>
                    </div>
                    <div class="p-6 items-center justify-center flex">
                        <p class="text-base">
                            Menjadikan bank sampah yang mendorong dan membimbing masyarakat
                            untuk menjaga lingkungan dan membangun budaya peduli terhadap
                            sampah.
                        </p>
                    </div>
                </div>
    
                <div class="bg-gray-100 shadow-lg overflow-hidden flex-1 border">
                    <div class="bg-primary p-1">
                        <h2 class="text-lg lg:text-2xl font-bold text-white text-center">
                            Misi
                        </h2>
                    </div>
                    <div class="p-6">
                        <ol class="list-decimal list-inside text-base space-y-2 pl-4">
                            <li class="mb-2">
                                Mengelola dan memanfaatkan sampah secara efisien untuk
                                mengurangi pencemaran lingkungan.
                            </li>
                            <li class="mb-2">
                                Mendidik masyarakat tentang pentingnya pengelolaan sampah yang
                                berkelanjutan.
                            </li>
                            <li class="mb-2">
                                Mendorong partisipasi aktif masyarakat dalam praktik daur
                                ulang dan pengurangan sampah.
                            </li>
                            <li class="mb-2">
                                Menciptakan peluang ekonomi melalui pengolahan sampah yang
                                berkelanjutan.
                            </li>
                            <li class="mb-2">
                                Bekerja sama dengan pemerintah dan organisasi lain untuk
                                mencapai tujuan lingkungan yang lebih bersih dan sehat.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
    <div class="w-full bg-gray-100 py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-center mb-3">Kegiatan</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="flex flex-col items-center p-3 bg-white rounded-lg shadow-md max-w-xs text-center">
                    <div class="w-full h-32 overflow-hidden mb-4">
                        <img src="{{ asset('images/sampah 1.jpg') }}" alt="Google"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-lg font-semibold mb-2">Kunjungan Ibuk Kepala Dinas DLH Kabupaten Solok</p>
                    <p class="text-sm text-gray-700 text-justify">
                        Dalam kunjungan ini, beliau berinteraksi dengan pengelola, memberikan arahan tentang 
                        pentingnya partisipasi aktif dalam pengelolaan sampah. Kunjungan ini juga menjadi kesempatan untuk 
                        membahas program edukatif yang dapat meningkatkan kesadaran masyarakat terhadap kebersihan lingkungan.</p>
                </div>
                <div class="flex flex-col items-center p-3 bg-white rounded-lg shadow-md max-w-xs text-center">
                    <div class="w-full h-32 overflow-hidden mb-4">
                        <img src="{{ asset('images/sampah 2.jpg') }}" alt="Microsoft"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-lg font-semibold mb-2">Sosialisasi Penanganan Sampah Plastik</p>
                    <p class="text-sm text-gray-700 text-justify">Sosialisasi penanganan sampah plastik bertujuan untuk meningkatkan 
                        kesadaran masyarakat tentang dampak negatif sampah plastik. Acara ini memberikan informasi tentang pemilahan, 
                        daur ulang, dan pengurangan penggunaan plastik sekali pakai, sehingga masyarakat dapat mengadopsi kebiasaan yang 
                        lebih ramah lingkungan.</p>
                </div>
                <div class="flex flex-col items-center p-3 bg-white rounded-lg shadow-md max-w-xs text-center">
                    <div class="w-full h-32 overflow-hidden mb-4">
                        <img src="{{ asset('images/sampah 3.jpeg') }}" alt="Apple"
                            class="w-full h-full object-cover">
                    </div>
                    <p class="text-lg font-semibold mb-2">Penyerahan Betor Pengangkut Sampah Bantuan Pemerintah</p>
                    <p class="text-sm text-gray-700 text-justify">Penyerahan Betor (Becak Motor) pengangkut sampah dari pemerintah bertujuan
                        untuk meningkatkan kapasitas pengelolaan sampah di masyarakat. Bantuan ini diharapkan mempermudah pengumpulan sampah 
                        dan mendukung program kebersihan lingkungan, serta mencerminkan komitmen pemerintah dalam menciptakan lingkungan yang 
                        lebih bersih dan sehat.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="Pembelian" class="scroll-mt-24 bg-gray-100 py-10">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Pembelian Produk Daur Ulang</h2>
            <div class="flex flex-wrap justify-center gap-8">              
                <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="flex justify-center mt-4">
                        <img src="{{ asset('images/minyak.jpg') }}" alt="Produk 1" class="max-w-xs h-48 object-contain rounded-t-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold">Minyak Lampu dari Plastik</h3>
                        <p class="text-gray-700 mt-2">Minyak yang berbahan dasar plastik untuk lampu</p>
                        <p class="text-lg font-bold mt-4">Rp.10.000/liter</p>
                        <a href="{{ route('penjualan.create') }}" class="block bg-primary text-white font-bold text-center py-2 mt-4 rounded hover:bg-teal-600">Beli Sekarang</a>
                    </div>
                </div>
                <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="flex justify-center mt-4">
                        <img src="{{ asset('images/tas.jpg') }}" alt="Produk 1" class="max-w-xs h-48 object-contain rounded-t-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold">Tas dari limbah Plastik</h3>
                        <p class="text-gray-700 mt-2">Kerajinana Tas yang dibuat dari plastik</p>
                        <p class="text-lg font-bold mt-4">Rp.30.000/pcs</p>
                        <a href="{{ route('penjualan.create') }}" class="block bg-primary text-white font-bold text-center py-2 mt-4 rounded hover:bg-teal-600">Beli Sekarang</a>
                    </div>
                </div>
                <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="flex justify-center mt-4">
                        <img src="{{ asset('images/kerajinan.jpeg') }}" alt="Produk 1" class="max-w-xs h-48 object-contain rounded-t-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold">Kerajinan dari kardus</h3>
                        <p class="text-gray-700 mt-2">Kerajinan sebagai fasilitas untuk belajar Alfabet</p>
                        <p class="text-lg font-bold mt-4">Rp 15.000</p>
                        <a href="{{ route('penjualan.create') }}" class="block bg-primary text-white font-bold text-center py-2 mt-4 rounded hover:bg-teal-600">Beli Sekarang</a>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

    <section class="contact-section scroll-m-24" id="Kontak">
        <div class="flex justify-center mt-10">
            <div class="bg-primary w-36 h-10 justify-center items-center flex rounded-lg">
                <h1 class="text-white font-bold text-lg text-center">Kontak</h1>
            </div>
        </div>
        <div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <p class="text-base lg:text-lg">
                    Untuk informasi lebih lanjut atau pertanyaan, Anda dapat menghubungi
                    kami melalui informasi kontak di bawah ini. Kami siap membantu Anda!
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-6 text-center">
                <div class="flex-1">
                    <h2 class="text-lg lg:text-2xl font-bold text-green-700 mb-2">
                        Alamat
                    </h2>
                    <p class="text-base">
                        Jorong Kubang Nan Raok, Nagari Supayang, Kecamatan Payung Sekaki, Kabupaten Solok - Suamtera Barat
                    </p>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg lg:text-2xl font-bold text-green-700 mb-2">
                        Telepon
                    </h2>
                    <p class="text-base">+62 831-8020-3746</p>
                </div>
            
                <div class="flex-1">
                    <h2 class="text-lg lg:text-2xl font-bold text-green-700 mb-2">
                        Email
                    </h2>
                    <p class="text-base">trashbiz@gmail.com</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:space-x-10 items-center max-w-screen-md mx-auto">
                <div class="space-y-4 md:w-1/2">
                    <a href="https://www.facebook.com/profile.php?id=100088461886289"
                        class="flex items-center justify-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f text-2xl mr-2"></i>
                        <span class="text-center">Facebook</span>
                    </a>
                    <a href="#"
                        class="flex items-center justify-center bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition">
                        <i class="fab fa-whatsapp text-2xl mr-2"></i>
                        <span class="text-center">WhatsApp</span>
                    </a>
                    <a href="#"
                        class="flex items-center justify-center bg-pink-600 text-white px-4 py-2 rounded-lg shadow hover:bg-pink-700 transition">
                        <i class="fab fa-instagram text-2xl mr-2"></i>
                        <span class="text-center">Instagram</span>
                    </a>
                    <a href="#"
                        class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                        <i class="fab fa-telegram-plane text-2xl mr-2"></i>
                        <span class="text-center">Telegram</span>
                    </a>
                </div>

                <div class="md:w-1/2 mt-6 md:mt-0 flex items-center justify-center">
                    <img src="{{ asset('images/rmv-1.png') }}" alt="Contact Image"
                        class="w-full rounded-lg shadow-md h-96 object-cover">
                </div>
            </div>

        </div>
    </section>


    <footer class="bg-primary text-white py-8">
        <div class="max-w-4xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-semibold mb-4" id="about">Lainnya</h2>
                    <p class="leading-relaxed">
                        TrashBiz adalah sebuah organisasi yang
                        didedikasikan untuk mengelola sampah secara online berkelanjutan serta
                        ramah lingkungan. Kami bekerja sama dengan masyarakat untuk
                        mengurangi limbah, meningkatkan kesadaran lingkungan, dan
                        menciptakan nilai ekonomi dari sampah yang didaur ulang. Melalui
                        pendidikan dan inovasi, kami berkomitmen untuk menciptakan
                        lingkungan yang lebih bersih dan sehat bagi generasi mendatang.
                    </p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-4">Hubungi Kami</h2>
                    <ul class="leading-relaxed space-y-2">
                        <li>
                            <strong>Alamat :</strong> Jorong Kubang Nan Raok, Nagari Supayang, Kecamatan Payung Sekaki, Kabupaten Solok - Suamtera Barat 
                        </li>
                        <li><strong>Telepon :</strong> +6283180203746</li>
                        <li><strong>Email :</strong> trashbiz@gmail.com</li>
                    </ul>
                </div>
            </div>
            <hr class="border-gray-600 my-8" />
            <p class="text-center text-lg">&copy; 2024 TrashBiz</p>
        </div>
    </footer>
    <div class="fixed bottom-4 right-4 z-50 group">
        <a href="https://wa.me/6285242537348" target="_blank" class="relative inline-block">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"
                class="w-16 h-16 lg:w-20 lg:h-20 " />
        </a>
    </div>
   
    <script src="{{ asset('javascript/page.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const text = "Selamat Datang Di Bank Sampah Pelita Bangsa";
            let index = 0;
            let isAdding = true;
            const speed = 100; 
            const pause = 2000;

            function typeWriter() {
                const typingElement = document.getElementById('typing-text');

                if (isAdding) {
                    if (index < text.length) {
                        typingElement.innerHTML += text.charAt(index);
                        index++;
                        setTimeout(typeWriter, speed);
                    } else {
                        isAdding = false;
                        setTimeout(typeWriter, pause);
                    }
                } else {
                    if (index > 0) {
                        typingElement.innerHTML = text.substring(0, index - 1);
                        index--;
                        setTimeout(typeWriter, speed);
                    } else {
                        isAdding = true;
                        setTimeout(typeWriter, speed);
                    }
                }
            }

            typeWriter();
        });
    </script>
</div>

@endsection
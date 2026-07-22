@extends('layouts.nagari')

@section('title', 'Contact')

@section('content')
    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12  text-green-600  mt-24 rounded-lg shadow-lg"  style="background-image: url('{{ asset('backgroundcontact1.jpeg') }}')">
        <h1 class="text-center font-bold text-4xl max-w-7xl">Contact Us</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="p-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" class="w-full h-[350px] rounded-lg" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
                <ul class="font-bold text-2xl">
                    <li class="mt-9">Kode pos: 25652</li>
                    <li class="mt-9">Email: kknkubangpessel@gmail.com</li>
                    <li class="mt-9">Phone: +62 822 8433 4512</li>
                    <li class="mt-9">Alamat: Nagari Kubang Bayang, Pesisir Selatan, Sumatera Barat</li>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-3">
                    </div>
                </ul>
            </div>
        </div>
        </div>
        </div>
        
 @include('layouts.footer')
@endsection
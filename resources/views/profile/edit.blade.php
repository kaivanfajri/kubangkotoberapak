@extends('layouts.app')

@section('header_title', 'Pengaturan Akun')
@section('header_subtitle', 'Kelola informasi profil admin dan kata sandi akun Anda.')

@section('content')
    <div style="max-width:760px; margin:0 auto;" class="space-y-6">
        <div class="card" style="padding:28px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0; margin-bottom:20px;">
            <div style="max-width: 500px;">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card" style="padding:28px; background:#fff; border-radius:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); border:1px solid #eef2f0; margin-bottom:20px;">
            <div style="max-width: 500px;">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('header_title', 'Kelola UMKM')
@section('header_subtitle', 'Kelola katalog usaha mikro masyarakat nagari.')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:12px;">
        <h3 style="font-size:1.1rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Daftar UMKM Nagari</h3>
        <a href="{{ route('admin.umkm.create') }}" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 20px; font-weight:700; text-decoration:none; font-size:13px;">+ Tambah UMKM</a>
    </div>

    @if(session('success'))
        <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">✓ {{ session('success') }}</div>
    @endif

    <div style="background:#fff; border-radius:16px; padding:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:13px;">
            <thead>
                <tr style="border-bottom:2px solid #eef2f0; text-align:left; color:var(--muted); font-size:12px; text-transform:uppercase;">
                    <th style="padding:12px; width:60px;">Foto</th>
                    <th style="padding:12px;">Nama Usaha</th>
                    <th style="padding:12px;">Pemilik</th>
                    <th style="padding:12px;">Kategori</th>
                    <th style="padding:12px;">Alamat</th>
                    <th style="padding:12px;">No. WA</th>
                    <th style="padding:12px; text-align:center; width:140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($umkms as $umkm)
                    <tr style="border-bottom:1px solid #f0f4f0;">
                        <td style="padding:12px;">
                            <div style="width:44px; height:44px; border-radius:10px; background:#e8f5e9; overflow:hidden;">
                                @if($umkm->foto)
                                    <img src="{{ asset('storage/'.$umkm->foto) }}" style="width:100%; height:100%; object-fit:cover;">
                                @endif
                            </div>
                        </td>
                        <td style="padding:12px; font-weight:600; color:var(--green-dark);">{{ $umkm->nama_usaha }}</td>
                        <td style="padding:12px;">{{ $umkm->pemilik }}</td>
                        <td style="padding:12px;"><span style="background:#fef3c7; color:#b45309; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">{{ $umkm->kategori }}</span></td>
                        <td style="padding:12px;">{{ $umkm->alamat }}</td>
                        <td style="padding:12px;">{{ $umkm->nomor_wa }}</td>
                        <td style="padding:12px; text-align:center;">
                            <div style="display:inline-flex; gap:6px;">
                                <a href="{{ route('admin.umkm.edit', $umkm) }}" style="border:1px solid var(--green); color:var(--green-dark); padding:6px 12px; border-radius:20px; font-weight:700; text-decoration:none; font-size:12px;">Edit</a>
                                <form action="{{ route('admin.umkm.destroy', $umkm) }}" method="POST" onsubmit="return confirm('Yakin hapus UMKM ini?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:6px 12px; border-radius:20px; font-weight:700; font-size:12px; cursor:pointer;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" style="text-align:center; padding:30px; color:var(--muted);">Belum ada data UMKM.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:20px;">{{ $umkms->links() }}</div>
@endsection

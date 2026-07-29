@extends('layouts.app')

@section('header_title', 'Kelola Data & Berita Nagari')
@section('header_subtitle', 'Daftar data hasil panen kelompok tani, berita, dan generasi QR Code publik.')

@section('content')
    <div style="margin-bottom: 24px;">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:14px; margin-bottom:18px;">
            <div>
                <h3 style="font-size:1.15rem; font-weight:700; color:var(--ink); font-family:'Poppins',sans-serif;">Daftar Data Hasil Panen</h3>
            </div>
            <a href="{{ route('admin.harvests.create') }}" class="btn btn-primary" style="background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; border-radius:24px; padding:10px 20px; font-weight:700; text-decoration:none;">
                + Tambah Data Panen
            </a>
        </div>

        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="table-wrap" style="background:#fff; border-radius:16px; padding:16px; box-shadow:0 4px 15px rgba(0,0,0,0.04); overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:13.5px;">
                <thead>
                    <tr style="border-bottom:2px solid #eef2f0; text-align:left; color:var(--muted);">
                        <th style="padding:12px;">Kelompok Tani</th>
                        <th style="padding:12px;">Hasil Pertanian</th>
                        <th style="padding:12px;">Varian</th>
                        <th style="padding:12px;">Total Panen</th>
                        <th style="padding:12px;">Stok Tersedia</th>
                        <th style="padding:12px;">Tanggal Panen</th>
                        <th style="padding:12px;">Nomor HP</th>
                        <th style="padding:12px;">Lokasi</th>
                        <th style="padding:12px; text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($harvests as $harvest)
                        <tr style="border-bottom:1px solid #f0f4f0;">
                            <td style="padding:12px; font-weight:600; color:var(--green-dark);">{{ $harvest->nama_kelompok_tani }}</td>
                            <td style="padding:12px;"><span class="pill pill-gold" style="background:#fef3c7; color:#b45309; padding:4px 10px; border-radius:12px; font-weight:600;">{{ $harvest->hasil_pertanian }}</span></td>
                            <td style="padding:12px;">{{ $harvest->varian }}</td>
                            <td style="padding:12px;"><strong>{{ $harvest->Total_panen }}</strong> kg</td>
                            <td style="padding:12px;"><strong>{{ $harvest->Stok_tersedia }}</strong> kg</td>
                            <td style="padding:12px;">{{ $harvest->tanggal_panen ? $harvest->tanggal_panen->format('d M Y') : '-' }}</td>
                            <td style="padding:12px;">{{ $harvest->nomor_hp }}</td>
                            <td style="padding:12px;">{{ $harvest->lokasi }}</td>
                            <td style="padding:12px; text-align:center;">
                                <div style="display:inline-flex; gap:6px;">
                                    <a href="{{ route('admin.harvests.show', $harvest) }}" class="btn btn-gold btn-sm" style="background:#fef3c7; color:#b45309; padding:6px 12px; border-radius:8px; font-weight:700; text-decoration:none; font-size:12px;">
                                        QR Code
                                    </a>

                                    <a href="{{ route('admin.harvests.edit', $harvest) }}" class="btn btn-outline btn-sm" style="border:1px solid var(--green); color:var(--green-dark); padding:6px 12px; border-radius:8px; font-weight:600; text-decoration:none; font-size:12px;">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.harvests.destroy', $harvest) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data panen ini?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="background:#fdeceb; color:#c0392b; border:1px solid #fca5a5; padding:6px 12px; border-radius:8px; font-weight:600; font-size:12px; cursor:pointer;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" style="text-align:center; padding:30px; color:var(--muted);">
                                Belum ada data panen yang tersimpan. Klik tombol "+ Tambah Data Panen" untuk menambahkan data baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px;">
            {{ $harvests->links() }}
        </div>
    </div>
@endsection
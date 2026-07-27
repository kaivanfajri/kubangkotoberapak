@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 24px;">
        <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:14px; margin-bottom:18px;">
            <div>
                <h2 style="font-size:22px; font-weight:700; color:var(--green-dark);">Kelola Data Panen Nagari</h2>
                <p style="color:var(--muted); font-size:13.5px;">Daftar data hasil panen kelompok tani dan generasi QR Code publik.</p>
            </div>
            <a href="{{ route('admin.harvests.create') }}" class="btn btn-primary">
                + Tambah Data Panen
            </a>
        </div>

        @if(session('success'))
            <div style="background:var(--green-light); border:1px solid var(--green); color:var(--green-dark); padding:12px 16px; border-radius:12px; margin-bottom:18px; font-weight:600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Kelompok Tani</th>
                        <th>Hasil Pertanian</th>
                        <th>Varian</th>
                        <th>Total Panen</th>
                        <th>Stok Tersedia</th>
                        <th>Tanggal Panen</th>
                        <th>Nomor HP</th>
                        <th>Lokasi</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($harvests as $harvest)
                        <tr>
                            <td style="font-weight:600; color:var(--green-dark);">{{ $harvest->nama_kelompok_tani }}</td>
                            <td><span class="pill pill-gold">{{ $harvest->hasil_pertanian }}</span></td>
                            <td>{{ $harvest->varian }}</td>
                            <td><strong>{{ $harvest->Total_panen }}</strong> kg</td>
                            <td><strong>{{ $harvest->Stok_tersedia }}</strong> kg</td>
                            <td>{{ $harvest->tanggal_panen ? $harvest->tanggal_panen->format('d M Y') : '-' }}</td>
                            <td>{{ $harvest->nomor_hp }}</td>
                            <td>{{ $harvest->lokasi }}</td>
                            <td style="text-align:center;">
                                <div style="display:inline-flex; gap:6px;">
                                    <a href="{{ route('admin.harvests.show', $harvest) }}" class="btn btn-gold btn-sm" title="Lihat QR Code">
                                        📱 QR
                                    </a>

                                    <a href="{{ route('admin.harvests.edit', $harvest) }}" class="btn btn-outline btn-sm">
                                        ✏️ Edit
                                    </a>

                                    <form action="{{ route('admin.harvests.destroy', $harvest) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data panen ini?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            🗑️ Hapus
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
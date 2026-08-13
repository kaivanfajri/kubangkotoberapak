@php
  $alamat = \App\Models\Setting::getValue('alamat_kantor', 'Kantor Wali Nagari Kubang Koto Berapak, Kec. Bayang, Kab. Pesisir Selatan, Sumatera Barat');
  $email = \App\Models\Setting::getValue('email_nagari', 'nagarikubangkb2011@gmail.com');
  $jamKerja = \App\Models\Setting::getValue('jam_kerja', 'Senin–Jumat, 08.00–16.00 WIB');
@endphp

<div class="contact-section">
  <div class="contact-grid">
    <div>
      <div class="eyebrow" style="color:var(--gold);">Hubungi Kami</div>
      <h2 style="font-family:'Poppins',sans-serif; font-size:26px; margin-bottom:20px;">Kami Siap Membantu</h2>
      <div class="contact-info">
        <div class="contact-row">
          <span>{{ $alamat }}</span>
        </div>
        <div class="contact-row">
          <span>Email: {{ $email }}</span>
        </div>
        <div class="contact-row">
          <span>Jam Kerja: {{ $jamKerja }}</span>
        </div>
      </div>

      {{-- QR CODE PENGADUAN --}}
      <div style="margin-top:24px; background:#f8faf8; border:1.5px solid #c8ddc8; border-radius:16px; padding:18px 20px; display:flex; align-items:center; gap:20px;">
        <a href="https://forms.gle/n1FUbecTAm9goBy66" target="_blank" rel="noopener" title="Buka Form Pengaduan">
          <img src="{{ asset('QR_Code_Pengaduan.png') }}" alt="QR Code Pengaduan Nagari" style="width:100px; height:100px; border-radius:10px; object-fit:contain; flex-shrink:0; display:block;">
        </a>
        <div>
          <div style="font-size:11px; font-weight:700; color:var(--green-dark); text-transform:uppercase; letter-spacing:0.5px; margin-bottom:4px;">Pengaduan Masyarakat</div>
          <p style="font-size:13px; color:var(--ink); line-height:1.6; margin-bottom:12px;">Sampaikan aspirasi, keluhan, atau laporan kepada Nagari Kubang Koto Berapak melalui form digital berikut.</p>
          <a href="https://forms.gle/n1FUbecTAm9goBy66" target="_blank" rel="noopener"
             style="display:inline-flex; align-items:center; gap:6px; background:linear-gradient(135deg,var(--green),var(--green-dark)); color:#fff; padding:8px 16px; border-radius:20px; font-size:12.5px; font-weight:700; text-decoration:none; box-shadow:0 3px 10px rgba(46,125,50,0.25);">
            Buka Form Pengaduan ↗
          </a>
        </div>
      </div>

      <div style="margin-top:16px; display:flex; gap:12px; flex-wrap:wrap;">
        <a class="btn btn-gold" href="mailto:{{ $email }}">Kirim Email</a>
      </div>
    </div>
    <div class="map-embed">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>


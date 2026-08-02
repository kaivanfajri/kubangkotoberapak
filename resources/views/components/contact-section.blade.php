@php
  $alamat = \App\Models\Setting::getValue('alamat_kantor', 'Kantor Wali Nagari Kubang Koto Berapak, Kec. Bayang, Kab. Pesisir Selatan, Sumatera Barat');
  $email = \App\Models\Setting::getValue('email_nagari', 'nagari.kubangkotoberapak@gmail.com');
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
      <div style="margin-top:22px; display:flex; gap:12px; flex-wrap:wrap;">
        <a class="btn btn-gold" href="mailto:{{ $email }}">Kirim Email</a>
      </div>
    </div>
    <div class="map-embed">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.680552856706!2d100.563779!3d-1.21577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd35538fb68881d%3A0xec799774440129c0!2sKantor%20Wali%20Nagari%20Kubang%20Koto%20berapak!5e0!3m2!1sid!2sid!4v1775002302337!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>


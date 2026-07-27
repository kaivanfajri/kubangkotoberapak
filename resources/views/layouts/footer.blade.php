<footer>
  <div class="footer-grid">
    <div>
      <div class="footer-brand">
        <div>
          <strong style="color:#fff;">Nagari Kubang Koto Berapak</strong><br>
          <span style="font-size:12.5px;">Kecamatan Bayang, Pesisir Selatan</span>
        </div>
      </div>
      <p style="font-size:13px; max-width:340px; line-height:1.7;">
        Portal resmi informasi pemerintahan, potensi pertanian, peternakan, dan UMKM Nagari Kubang Koto Berapak.
      </p>
    </div>
    <div>
      <h4>Quick Links</h4>
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('Sejarah') }}">Sejarah</a>
      <a href="{{ route('pertanian') }}">Pertanian</a>
      <a href="{{ route('Peternakan') }}">Peternakan</a>
      <a href="{{ route('umkm') }}">UMKM</a>
    </div>
    <div>
      <h4>Lainnya</h4>
      <a href="{{ route('struktur') }}">Struktur Nagari</a>
      <a href="{{ route('lembaga') }}">Lembaga</a>
      <a href="{{ route('galeri') }}">Galeri</a>
      <a href="{{ route('contact') }}">Hubungi Kami</a>
      <a href="{{ route('login') }}">Login Admin</a>
    </div>
  </div>
  <div class="footer-bottom">
    © {{ date('Y') }} Nagari Kubang Bayang Koto Berapak. All rights reserved.
  </div>
</footer>
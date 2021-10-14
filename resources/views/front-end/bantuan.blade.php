@extends('layouts.front')
@section('content')
@section('img')
<img src="{{ asset('img/logo/sikoding.png') }}" alt="">
@endsection
<div class="container">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card p-4 bg-white shadow-sm border-0">
                <h3>Pusat Bantuan</h3>
                <div class="accordion mt-3" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Bagaimana Cara Mendaftar ?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <ol>
                              <li>Buka website sikoding</li>
                              <li>Pilih Menu Daftar</li>
                              <li>Masukkan data sesuai inputan yang tersedia</li>
                              <li>Verifikasi Email</li>
                              <li>Klik Verifikasi</li>
                              <li>Selamat anda sudah terdaftar</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Bagaimana Cara Mengikuti Kursus ?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <ol>
                              <li>Pastikan sudah mempunyai akun SiKoding terlebih dahulu, jika belum silahkan untuk membaca bantuan cara mendaftar</li>
                              <li>Pilih Menu Courses</li>
                              <li>Pilih courses yang ingin diikuti</li>
                              <li>Klik tombol belajar</li>
                              <li>Pilih list episode yang ditonton</li>
                              <li>Selesai</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Bagaimana Cara Mendapatkan Sertifikat ?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <ol>
                            <li>Untuk mendapatkan sertifikat kamu harus mengikuti courses terlebih dahulu dan menyelesaikan projek yang sudah diinstruksikan</li>
                            <li>Upload Project</li>
                            <li>Tunggu email masuk dari sikoding terkait kode sertifikat</li>
                            <li>Jika sudah menerima, pilih menu sertifikat</li>
                            <li>Masukkan kode sertifikat</li>
                            <li>Klik tombol cetak</li>
                            <li>Sertifikat Berhasil di download</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Bagaimana Jika Lupa Password ?
                        </button>
                      </h2>
                      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <ol>
                              <li>Pastikan kamu sudah memiliki akun SiKoding</li>
                              <li>Pilih Menu Login</li>
                              <li>Klik Tombol Lupa kata sandi</li>
                              <li>Masukkan Email</li>
                              <li>Klik link yang di berikan melalui email</li>
                              <li>Masukkan kata sandi baru</li>
                              <li>Kata sandi berhasil diganti</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<section class="footer border-top mt-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4">
                <img src="{{ asset('img/logo/sikoding.png') }}" alt="">
                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, odit. Enim ratione, eveniet inventore necessitatibus vitae, culpa minima fugiat possimus praesentium suscipit, voluptatum impedit ex nihil nostrum assumenda libero sapiente.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Location</h5>
                <p>PT SiKoding Membangun Indonesia
                    <br>
                    Jln Syeh Quro No 103
                    <br>
                    Karawang, Indonesia
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Say Hello</h5>
                <p>info@sikoding.com</p>
            </div>
        </div>
        <div class="row">
            <p class="text-center">
                Copyright 2021 All Right Reserved | By <span class="text-primary">Sikoding</span>
            </p>
        </div>
    </div>
</section>
@endsection

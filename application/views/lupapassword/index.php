<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Masukan pertanyaan keamanan</strong>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info-circle"></i> Pertanyaan keamanan berfungsi jika anda <b>lupa password</b>. Silahkan isi dan ingat ingat jawabannya.
                        </div>
                        <form action="<?= base_url() ?>lupapassword/prosesTambahPertanyaanKeamanan" method="POST">
                            <div class="form-group">
                                <label>Pertanyaan 1</label>
                                <select class="form-control" name="pertanyaankeamanan1">
                                    <option selected disabled>Pilih Salah Satu Pertanyaan</option>
                                    <option value="Apa angka favorit anda?(Contoh: 29)">Apa angka favorit anda?(Contoh: 29)</option>
                                    <option value="Apa nama belakang ibu anda?">Apa nama belakang ibu anda?</option>
                                    <option value="Di kota manakah ayah dan ibu anda bertemu?">Di kota manakah ayah dan ibu anda bertemu?</option>
                                    <option value="Siapakah teman masa kecil anda?">Siapakah teman masa kecil anda?</option>
                                </select>
                                <label>Jawaban Pertanyaan 1</label>
                                <input type="text" name="jawabankeamanan1" class="form-control" placeholder="Masukan Jawaban" required>
                            </div><br>
                            <div class="form-group">
                                <label>Pertanyaan 2</label>
                                <select class="form-control" name="pertanyaankeamanan2">
                                    <option selected disabled>Pilih Salah Satu Pertanyaan</option>
                                    <option value="Apa hobby anda?">Apa hobby anda?</option>
                                    <option value="Siapakah nama cinta pertama anda?">Siapakah cinta pertama anda?</option>
                                    <option value="Siapakah guru terfavorit anda?">Siapakah guru terfavorit anda?</option>
                                    <option value="Siapakah nama hewan peliharaan anda?">Siapakah nama hewan peliharaan anda?</option>
                                </select>
                                <label>Jawaban Pertanyaan 2</label>
                                <input type="text" name="jawabankeamanan2" class="form-control" placeholder="Masukan Jawaban" required>
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
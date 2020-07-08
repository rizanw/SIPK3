@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><strong>Buat</strong> <small>Inspeksi Kecelakaan</small></div>
                        <div class="card-body">
                            <form action="{{route('kecelakaan.create')}}" method="post">
                                @csrf
                                <h4 class="mb-3">Informasi Kejadian</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kejadian">Kejadian</label>
                                    <input name="kejadian" class="form-control" id="kejadian" type="text"
                                           placeholder="Kejadian">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Kejadian</label>
                                    <input name="lokasi" class="form-control" id="lokasi" type="text"
                                           placeholder="Lokasi kejadian">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Kejadian</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date">
                                </div>
                                <div class="form-group">
                                    <label for="jam">Jam Kejadian</label>
                                    <input name="jam" class="form-control" id="jam" type="time">
                                </div>
                                <div class="form-group">
                                    <label for="alk">Atasan Langsung Korban</label>
                                    <input name="alk" class="form-control" id="alk" type="text"
                                           placeholder="Atasan Langsung Korban">
                                </div>
                                <div class="form-group">
                                    <label for="saksi">Saksi</label>
                                    <input name="saksi" class="form-control" id="saksi" type="text"
                                           placeholder="Saksi">
                                </div>
                                <h4 class="mb-3 mt-4">Data Korban</h4>
                                <hr/>
                                <div class="list-data-korban">
                                    <div class="row data-korban">
                                        <div class="form-group col-sm-5">
                                            <label for="nama-korban">Nama</label>
                                            <input name="nama-korban[]" class="form-control" id="nama-korban"
                                                   type="text"
                                                   placeholder="Nama korban">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="jenis-kelamin">Jenis Kelamin</label>
                                            <select name="jenis-kelamin[]" class="form-control" id="jenis-kelamin">
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="usia-korban">Usia</label>
                                            <input name="usia-korban[]" class="form-control" id="usia-korban"
                                                   type="number"
                                                   min="0" placeholder="Usia korban">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="button" class="btn btn-secondary" id="add-korban"
                                           value="Tambah data korban" onclick="addKorban();">
                                    <input type="button" class="btn btn-light" id="reduce-korban"
                                           value="Kurangi data korban" onclick="reduceKorban();">
                                </div>
                                <div class="form-group">
                                    <label for="akibat">Akibat Yang Ditimbulkan</label>
                                    <input name="akibat" class="form-control" id="akibat" type="text"
                                           placeholder="Akibat Yang Ditimbulkan">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah-korban">Jumlah Korban</label>
                                    <input name="jumlahkorban" class="form-control" id="jumlah-korban" type="number"
                                           min="0"
                                           placeholder="Jumlah Korban" value="0">
                                </div>
                                <h4 class="mb-3 mt-4">Kronologi</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="kronologi">Kronologi Terjadinya Kecelakaan</label>
                                    <textarea name="kronologi" class="form-control" id="kronologi" rows="6"
                                              placeholder="Tuliskan kronologi kecelakaan.."></textarea>
                                </div>
                                <h4 class="mb-3 mt-4">Penilaian Resiko</h4>
                                <hr/>
                                <h5 class="mb-3">Severity / Keparahan</h5>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio5-severity" type="radio"
                                               value="5"
                                               name="severity">
                                        <label class="form-check-label" for="inline-radio5-severity">
                                            <strong>(Catastrophic) :</strong>
                                            Fatality / menyebabkan kematian atau cacat tetap.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio4-severity" type="radio"
                                               value="4"
                                               name="severity">
                                        <label class="form-check-label" for="inline-radio4-severity">
                                            <strong>(Major) : </strong>
                                            LTI (Lost Time Incident) / menyebabkan hilangnya hari kerja
                                            lebih dari 2 x 24 jam, cacat tidak tetap, pekerja dipindahkan dari posisi
                                            sebelumnya karena faktor kesehatan.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio3-severity" type="radio"
                                               value="3"
                                               name="severity">
                                        <label class="form-check-label" for="inline-radio3-severity">
                                            <strong>(Moderate) : </strong>
                                            MTC (Medical Treatment Case) / menyebabkan hilangnya hari kerja
                                            kurang dari 2 x 24 jam, mendapatkan perawatan dari rumah sakit terdekat.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio2-severity" type="radio"
                                               value="2"
                                               name="severity">
                                        <label class="form-check-label" for="inline-radio2-severity">
                                            <strong>(Minor) : </strong>
                                            FAC (First Aid Case) / menyebabkan luka ringan, tidak memerlukan
                                            perawatan di rumah sakit hanya pertolongan P3K.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio1-severity" type="radio"
                                               value="1"
                                               name="severity">
                                        <label class="form-check-label" for="inline-radio1-severity">
                                            <strong>(Insignificant) : </strong>
                                            Near miss / Kondisi hampir celaka dan tidak menyebabkan luka
                                            maupun gangguan kesehatan.
                                        </label>
                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4">Likelihood / Kemungkinan</h5>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio5-likelihood" type="radio"
                                               value="5"
                                               name="likelihood">
                                        <label class="form-check-label" for="inline-radio5-likelihood">
                                            <strong>(Very High) :</strong>
                                            Sering terjadi;
                                            Untuk Insiden, minimal dalam waktu 1 bulan terakhir tdk
                                            pernah/berkemungkinan
                                            terjadi insiden;
                                            Untuk paparan/exposure &/menghasilkan waste/polusi ke lingkungan terjadi
                                            pada
                                            aktifitas rutin dan disebabkan karena belum adanya program &/training
                                            &/perawatan.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio4-likelihood" type="radio"
                                               value="4"
                                               name="likelihood">
                                        <label class="form-check-label" for="inline-radio4-likelihood">
                                            <strong>(High) : </strong>
                                            Dapat terjadi, umumnya terjadi pada aktifitas rutin;
                                            Untuk Insiden, minimal dalam waktu 6 bulan terakhir tdk
                                            pernah/berkemungkinan
                                            terjadi insiden;
                                            Untuk paparan/exposure &/menghasilkan waste/polusi ke lingkungan terjadi
                                            pada
                                            aktifitas rutin dan disebabkan karena belum adanya program &/training
                                            &/perawatan.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio3-likelihood" type="radio"
                                               value="3"
                                               name="likelihood">
                                        <label class="form-check-label" for="inline-radio3-likelihood">
                                            <strong>(Medium) : </strong>
                                            Mungkin terjadi, umumnya terjadi pada aktifitas rutin;
                                            Untuk Insiden, minimal dalam waktu 1th - 6 bulan terakhir tdk pernah /
                                            berkemungkinan terjadi;
                                            Untuk paparan dan atau menghasilkan limbah / polusi ke lingkungan terjadi
                                            pada
                                            aktifitas normal.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio2-likelihood" type="radio"
                                               value="2"
                                               name="likelihood">
                                        <label class="form-check-label" for="inline-radio2-likelihood">
                                            <strong>(Low) : </strong>
                                            Dapat terjadi, umumnya terjadi pada aktifitas rutin;
                                            Untuk Insiden, minimal dalam waktu 6 bulan terakhir tdk
                                            pernah/berkemungkinan
                                            terjadi insiden;
                                            Untuk paparan/exposure &/menghasilkan waste/polusi ke lingkungan terjadi
                                            pada
                                            aktifitas rutin dan disebabkan karena belum adanya program &/training
                                            &/perawatan.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio1-likelihood" type="radio"
                                               value="1"
                                               name="likelihood">
                                        <label class="form-check-label" for="inline-radio1-likelihood">
                                            <strong>(Rare) : </strong>
                                            Umumnya terjadi pada kasus emergency;
                                            Minimal dalam waktu 3 th tidak pernah terjadi insiden / kecelakaan.
                                        </label>
                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4">Tingkat Risiko:</h5>
                                <div class="form-group">
                                    <label class="form-check-label" id="resiko-level">
                                        (Isi Form Penilaian Resiko di Atas dengan Benar!)
                                    </label>
                                </div>
                                <h4 class="mb-3 mt-4">Foto</h4>
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="foto">Upload foto kejadian</label>
                                    <div class="col-md-9">
                                        <input name="foto" id="foto" type="file">
                                    </div>
                                </div>
                                <h4 class="mb-3 mt-4">Tindakan Perbaikan dan Pencegahan</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="tindakan">Tindakan</label>
                                    <textarea name="tindakan" class="form-control" id="tindakan" rows="6"
                                              placeholder="Tuliskan Tindakan.."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="penanggung-jawab">Penanggung Jawab</label>
                                    <input name="pj" class="form-control" id="penanggung-jawab" type="text"
                                           placeholder="Penanggung Jawab">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Open</option>
                                        <option value="0">Close</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        jumlahKorban = 1;

        function addKorban() {
            $(".data-korban:last").clone().appendTo(".list-data-korban");
            if ($('.data-korban').length > 1) {
                $("#reduce-korban").removeClass('btn-light');
                $("#reduce-korban").addClass('btn-danger');
                jumlahKorban += 1;
                $('#jumlah-korban').val(jumlahKorban);
            }
        }

        function reduceKorban() {
            if ($('.data-korban').length > 1) {
                $('.data-korban:last').remove();
                jumlahKorban -= 1;
                $('#jumlah-korban').val(jumlahKorban);
            }
            if ($('.data-korban').length <= 1) {
                $("#reduce-korban").removeClass('btn-danger');
                $("#reduce-korban").addClass('btn-light');
            }
        }

        likelihood_val = 0
        severity_val = 0

        function count_resiko() {
            resiko_val = likelihood_val * severity_val;
            if (resiko_val >= 1 && resiko_val <= 4) {
                console.log("rendah");
                $("#resiko-level").html("<strong>(" + resiko_val + ") Risiko rendah </strong>/ tidak seberapa penting, dapat dilakukan tindak lanjut seperlunya.");
            } else if (resiko_val >= 5 && resiko_val <= 10) {
                console.log("sedang");
                $("#resiko-level").html("<strong>(" + resiko_val + ") Risiko sedang </strong>/  penting, lakukan tindak lanjut yang di perlukan!");
            } else if (resiko_val >= 11 && resiko_val <= 25) {
                console.log("tinggi");
                $("#resiko-level").html("<strong>(" + resiko_val + ") Risiko tinggi </strong>/ darurat!! Lakukan tindak lanjut segera!!!");
            }
        }

        $('input:radio[name="likelihood"]').change(
            function () {
                if ($(this).is(':checked')) {
                    likelihood_val = parseInt($(this).val());
                    count_resiko();
                }
            });

        $('input:radio[name="severity"]').change(
            function () {
                if ($(this).is(':checked')) {
                    severity_val = parseInt($(this).val());
                    count_resiko();
                }

            });

        $(document).ready(function () {
            likelihood_val = $('input:radio[name="likelihood"]:checked').val();
            severity_val = $('input:radio[name="severity"]:checked').val();
            count_resiko();
        });
    </script>
@endsection

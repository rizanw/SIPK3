@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Detail</strong> <small>Inspeksi Ketidaksesuaian</small>
                            <div class="card-header-actions">
                                @hasanyrole('admin')
                                <form action="{{route('ketidaksesuaian.delete')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <input type="button" class="btn btn-sm btn-info" id="update-status" value="Ubah Status">
                                    <input type="submit" class="btn btn-sm btn-danger" id="delete"
                                           value="Hapus Inspeksi"
                                           onclick="return confirm('Apakah Anda Yakin Untuk Menghapus?')">
                                </form>
                                @endhasrole
                                @hasanyrole('Maintainer')
                                <input type="button" class="btn btn-sm btn-warning maintainer-job" value="Lakukan Maintaince"
                                       onclick="location.href = '{{route("maintaince.ketidaksesuian.add")}}'">
                                @endhasrole
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$data->id}}" name="id">
                                <h4 class="mb-3">Informasi Temuan</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="temuan">Temuan</label>
                                    <input name="temuan" class="form-control" id="temuan" type="text"
                                           placeholder="Deskripsi Temuan" value="{{$data->temuan}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Temuan</label>
                                    <input name="tanggal" class="form-control" id="tanggal" type="date"
                                           value="{{$data->tanggal}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="kategori-temuan">Kategori Temuan</label>
                                    <select name="kategori" class="form-control" id="kategori-temuan" disabled>
                                        <option value="unsafe-action"
                                                @if($data->kategori == "unsafe-action") selected @endif>
                                            Unsafe Action
                                        </option>
                                        <option value="unsafe-condition"
                                                @if($data->kategori == "unsafe-condition") selected @endif>
                                            Unsafe Condition
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input name="lokasi" class="form-control" id="lokasi" type="text"
                                           placeholder="Lokasi" value="{{$data->lokasi}}" disabled>
                                </div>
                                <h4 class="mb-3 mt-4">Foto</h4>
                                <hr/>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="foto">Upload foto kejadian</label>
                                    <div class="col-md-9">
                                        <input name="foto" id="foto" type="file" disabled>
                                        @if($data->photo)
                                            <?php $path = Storage::url($data->photo); ?>
                                            <img width="480" src="{{ url($path) }}">
                                        @endif
                                    </div>
                                </div>
                                <h4 class="mb-3 mt-4">Penilaian Resiko</h4>
                                <hr/>
                                <h5 class="mb-3">Severity / Keparahan</h5>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio5-severity" type="radio"
                                               disabled
                                               value="5" name="severity"
                                               @if($data->resiko_keparahan == 5) checked @endif>
                                        <label class="form-check-label" for="inline-radio5-severity">
                                            <strong>(Catastrophic) : </strong>
                                            Dampak polusi / pencemaran keluar dari perusahaan;
                                            Dampak kerusakan lingkungan permanen, tidak bisa tergradasi alami.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio4-severity" type="radio"
                                               disabled
                                               value="4" name="severity"
                                               @if($data->resiko_keparahan == 4) checked @endif>
                                        <label class="form-check-label" for="inline-radio4-severity">
                                            <strong>(Major) : </strong>
                                            Dampak pada seluruh area perusahaan. Pemulihan akibat dampak perlu waktu > 6
                                            bulan;
                                            Konsumsi energy yang tidak dapat diperbaharui dalam jumlah besar dan
                                            kontinu;
                                            Disyaratkan dalam perundangan/persyaratan lingkungan dengan Baku Mutu.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio3-severity" type="radio"
                                               disabled
                                               value="3" name="severity"
                                               @if($data->resiko_keparahan == 3) checked @endif>
                                        <label class="form-check-label" for="inline-radio3-severity">
                                            <strong>(Moderate) : </strong>
                                            Dampak pencemaran pada beberapa bagian / dept, tetapi perlu penanganan
                                            khusus/dibutuhkan untuk pemulihannya < 6 bulan;
                                            Konsumsi energy yg tidak dapat diperbaharui dalam jumlah besar tetapi tidak
                                            kontinu atau konsumsi dalam jumlah kecil tetapi kontinu.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio2-severity" type="radio"
                                               disabled
                                               value="2" name="severity"
                                               @if($data->resiko_keparahan == 2) checked @endif>
                                        <label class="form-check-label" for="inline-radio2-severity">
                                            <strong>(Minor) : </strong>
                                            Dampak pencemaran pada satu bagian / dept.;
                                            Konsumsi energy yg tidak dapat diperbaharui dalam jumlah besar tetapi tidak
                                            kontinu atau konsumsi dalam jumlah kecil tetapi kontinu.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio1-severity" type="radio"
                                               disabled
                                               value="1" name="severity"
                                               @if($data->resiko_keparahan == 1) checked @endif>
                                        <label class="form-check-label" for="inline-radio1-severity">
                                            <strong>(Insignificant) : </strong>
                                            Dampak pada area lokal dept, dapat ditangani oleh karyawan di area terkait
                                            &/
                                            dapat diperbaharukan / terdegradasi oleh lingkungan;
                                            Konsumsi energy yg dalam jumlah kecil & tidak kontinu.
                                        </label>
                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4">Likelihood / Kemungkinan</h5>
                                <div class="form-group">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio5-likelihood" type="radio"
                                               disabled
                                               value="5" name="likelihood"
                                               @if($data->resiko_kemungkinan == 5) checked @endif>
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
                                               disabled
                                               value="4" name="likelihood"
                                               @if($data->resiko_kemungkinan == 4) checked @endif>
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
                                               disabled
                                               value="3" name="likelihood"
                                               @if($data->resiko_kemungkinan == 3) checked @endif>
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
                                               disabled
                                               value="2" name="likelihood"
                                               @if($data->resiko_kemungkinan == 2) checked @endif>
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
                                               disabled
                                               value="1" name="likelihood"
                                               @if($data->resiko_kemungkinan == 1) checked @endif>
                                        <label class="form-check-label" for="inline-radio1-likelihood">
                                            <strong>(Rare) : </strong>
                                            Umumnya terjadi pada kasus emergency;
                                            Minimal dalam waktu 3 th tidak pernah terjadi insiden / kecelakaan.
                                        </label>
                                    </div>
                                </div>
                                <h5 class="mb-3 mt-4">Tingkat Risiko:</h5>
                                <div class="form-group">
                                    <label class="form-check-label" id="resiko-level">(Isi Form Penilaian Resiko di Atas
                                        dengan Benar!)</label>
                                </div>

                                <h4 class="mb-3 mt-4">Tindakan Korektif</h4>
                                <hr/>
                                <div class="form-group">
                                    <label for="pic">PIC</label>
                                    <input name="pic" class="form-control" id="pic" type="text"
                                           placeholder="PIC" value="{{$data->pic}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="pelapor">Pelapor</label>
                                    <input name="pelapor" class="form-control" id="pelapor" type="text"
                                           placeholder="Pelapor" value="{{$data->pelapor}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tindakan-korektif">Tindakan Korektif</label>
                                    <textarea name="tindakan" class="form-control" id="tindakan-korektif" rows="6"
                                              placeholder="Tuliskan tindakan korektif.." disabled>
                                        {{$data->tindakan}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" disabled>
                                        <option @if($data->status == 1) selected @endif value="1">Open</option>
                                        <option @if($data->status == 0) selected @endif value="0">Close</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" value="Simpan" class="btn btn-primary" disabled>
                                    @hasanyrole('Maintainer')
                                    <input type="button" class="btn btn-warning maintainer-job" value="Lakukan Maintaince"
                                           onclick="location.href = '{{route("maintaince.ketidaksesuian.add")}}'">
                                    @endhasrole
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
        $("#update-status").click(function () {
            if ($("form input[type='submit']").prop('disabled')) {
                $("form input[type='submit']").prop('disabled', false);
                $("form #status").prop('disabled', false);
                $("form").prop('action', "{{route('ketidaksesuaian.update.status')}}");
            } else {
                $("form input[type='submit']").prop('disabled', true);
                $("form #status").prop('disabled', true);
                $("form").prop('action', "");
            }
            $('html, body').animate({scrollTop: $(document).height()}, 'slow');
        });

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

            $status = $('#status').val();
            if($status === '1'){
                $(".maintainer-job").prop('disabled', false);
            }else{
                $(".maintainer-job").prop('disabled', true);
            }
        });
    </script>
@endsection

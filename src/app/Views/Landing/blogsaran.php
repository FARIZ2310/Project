<?= $this->extend('Landing/layout/main') ?>

<?= $this->section('content') ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Layanan</p>
                    <h1>Blog Saran</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="card-datatable table-responsive">
                <table id="table" class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Saran</th>
                            <th>Tanggapan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>


        </div>
        <div class="row mt-5">
            <div class="col mb-lg-0">
                <div class="form-title">
                    <h2>Punya saran?</h2>
                    <p>Silahkan kirimkan saran untuk kami!</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form action="<?= base_url('Layanan/BlogSaran/add') ?>" method="post" id="formTambah">
                        <p><textarea name="saran" id="saran" cols="30" rows="10" placeholder="Saran"></textarea>
                            <span class="text-danger error-text saran_error"></span>
                        </p>
                        <p><input type="submit" value="Kirim"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->



<?= $this->endSection() ?>

<?= $this->section('js') ?>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url() ?>/Layanan/BlogSaran/tables',
                method: 'POST'
            },
            columnDefs: [{
                    "targets": [0],
                    "data": "0",
                    "orderable": false,
                },
                {
                    "targets": [1],
                    "data": "2",
                },
                {
                    "targets": [2],
                    "data": "3",
                },
            ],
        });

    });

    $("#formTambah").submit(function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    if (data.code == 1) {
                        $(form)[0].reset();

                        swal('Berhasil mengirim saran!', {
                            icon: 'success',
                        })
                    } else {
                        alert(data.msg);
                    }
                } else {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>
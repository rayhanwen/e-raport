<div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        public function ambil_detail_ekstra($id) {
        $this->db->select('ekstra.*, guru.nama_guru, kelas.nama_kelas, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester');
        $this->db->from('ekstra');
        $this->db->join('guru', 'ekstra.nik = guru.nik', 'left');
        $this->db->join('kelas', 'ekstra.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tahun_ajaran', 'ekstra.id_tahun = tahun_ajaran.id_tahun', 'left');
        $this->db->where('ekstra.id_ekstra', $id);
        return $this->db->get()->row(); // Menggunakan row() untuk mengambil satu baris data
    }
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ekstra_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['ekstra'] = $this->Ekstra_model->tampil_data();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('ekstra', $data); // Memuat view ekstra.php
        $this->load->view('templates_administrator/footer');
    }

    public function tambah() {
        $data['ekstra'] = $this->Ekstra_model->tampil_data();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('ekstra', $data); // Memuat view ekstra.php
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_aksi() {
        $this->form_validation->set_rules('nama_ekstra', 'Nama Ekstrakurikuler', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_ekstra' => $this->input->post('nama_ekstra'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->Ekstra_model->insert_ekstrakulikuler($data);
            redirect('ekstra');
        }
    }

    public function update($id) {
        $data['ekstra'] = $this->Ekstra_model->get_ekstrakulikuler_by_id($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('ekstra_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id = $this->input->post('id_ekstra');
        $data = array(
            'nama_ekstra' => $this->input->post('nama_ekstra'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->Ekstra_model->update_ekstrakulikuler($id, $data);
        redirect('ekstra');
    }

    public function delete($id) {
        $this->Ekstra_model->delete_ekstrakulikuler($id);
        redirect('ekstra');
    }
}
?>



<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Ekstrakurikuler
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/tambah', '<button class="btn btn-sm btn-primary mb-3">Tambah Ekstrakurikuler</button>') ?>
    
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA EKSTRAKURIKULER</th>
                <th>DESKRIPSI</th>
                <th>Aksi</th>
            </tr>
        </thead> 
        <tbody>
            <?php if (!empty($ekstra)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($ekstra as $ex) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $ex->nama_ekskul ?></td>
                        <td><?= $ex->deskripsi ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?= anchor('administrator/update/'.$ex->id_ekskul, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                                <?= anchor('administrator/delete/'.$ex->id_ekskul, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Belum ada data ekstrakurikuler</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
'

<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Tambah Ekstrakurikuler
    </div>
    <form action="<?php echo base_url('administrator/ekstra/tambah_aksi'); ?>" method="post">
        <div class="form-group">
            <label>Nama Ekstrakurikuler</label>
            <input type="text" name="nama_ekstra" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Nama Guru</label>
            <select name="guru" class="form-control">
                <?php foreach ($guru_list as $guru) : ?>
                    <option value="<?php echo $guru->nik; ?>"><?php echo $guru->nama_guru; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control">
                <?php foreach ($kelas_list as $kelas) : ?>
                    <option value="<?php echo $kelas->id_kelas; ?>"><?php echo $kelas->nama_kelas; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('administrator/ekstra'); ?>" class="btn btn-danger">Batal</a>
    </form>

    <hr>

    <div class="alert alert-success" role="alert">
        <i class="fas fa-user-plus"></i> Tambah Siswa ke Ekstrakurikuler
    </div>
    <form action="<?php echo base_url('administrator/ekstra/tambah_siswa_aksi'); ?>" method="post">
        <div class="form-group">
            <label>Nama Ekstrakurikuler</label>
            <select name="id_ekstra" class="form-control">
                <?php foreach ($ekstra_list as $ekstra) : ?>
                    <option value="<?php echo $ekstra->id_ekstra; ?>"><?php echo $ekstra->nama_ekstra; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control">
                <option value="">Pilih Kelas</option>
            </select>
        </div>
        <div class="form-group">
            <label>Siswa</label>
            <select name="nis" class="form-control">
                <option value="">Pilih Siswa</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('select[name="id_ekstra"]').change(function() {
            var id_ekstra = $(this).val();
            if (id_ekstra != '') {
                $.ajax({
                    url: "<?php echo base_url('administrator/ekstra/get_kelas_by_ekstra'); ?>",
                    method: "POST",
                    data: {
                        id_ekstra: id_ekstra
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '<option value="">Pilih Kelas</option>';
                        $.each(data, function(key, value) {
                            html += '<option value="' + value.id_kelas + '">' + value.nama_kelas + '</option>';
                        });
                        $('select[name="id_kelas"]').html(html);
                    }
                });
            } else {
                $('select[name="id_kelas"]').html('<option value="">Pilih Kelas</option>');
                $('select[name="nis"]').html('<option value="">Pilih Siswa</option>');
            }
        });

        $('select[name="id_kelas"]').change(function() {
            var id_kelas = $(this).val();
            if (id_kelas != '') {
                $.ajax({
                    url: "<?php echo base_url('administrator/ekstra/get_siswa_by_kelas'); ?>",
                    method: "POST",
                    data: {
                        id_kelas: id_kelas
                    },
                    dataType: 'json',
                    success: function(data) {
                        var html = '<option value="">Pilih Siswa</option>';
                        $.each(data, function(key, value) {
                            html += '<option value="' + value.nis + '">' + value.nama_siswa + '</option>';
                        });
                        $('select[name="nis"]').html(html);
                    }
                });
            } else {
                $('select[name="nis"]').html('<option value="">Pilih Siswa</option>');
            }
        });
    });
</script>
'
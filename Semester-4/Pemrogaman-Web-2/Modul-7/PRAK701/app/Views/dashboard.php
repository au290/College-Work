<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-book me-2"></i>Daftar Buku</h5>
        <button id="addBookBtn" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Tambah Buku Baru
        </button>
    </div>
    <div class="card-body">
        <?php if (!empty($buku)): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buku as $book): ?>
                            <tr>
                                <td><?= esc($book['judul']) ?></td>
                                <td><?= esc($book['penulis']) ?></td>
                                <td><?= esc($book['penerbit']) ?></td>
                                <td><?= esc($book['tahun_terbit']) ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary editBookBtn" 
                                        data-id="<?= $book['id'] ?>" 
                                        data-judul="<?= esc($book['judul']) ?>" 
                                        data-penulis="<?= esc($book['penulis']) ?>" 
                                        data-penerbit="<?= esc($book['penerbit']) ?>" 
                                        data-tahun="<?= esc($book['tahun_terbit']) ?>">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    
                                    <form action="/dashboard/delete/<?= $book['id'] ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>Tidak ada data buku ditemukan.
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Add Book Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-circle me-2"></i>Tambah Buku Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addBookForm" action="/dashboard/create" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Buku</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Book Modal -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square me-2"></i>Edit Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBookForm" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editJudul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="editJudul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPenulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="editPenulis" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPenerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="editPenerbit" name="penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTahun" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="editTahun" name="tahun_terbit" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Buku</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Add Book Modal
        const addBookBtn = document.getElementById('addBookBtn');
        const addBookModalEl = document.getElementById('addBookModal');
        
        addBookBtn.addEventListener('click', () => {
            const addBookModal = new bootstrap.Modal(addBookModalEl);
            addBookModal.show();
        });
        
        // Edit Book Modal
        const editBookModalEl = document.getElementById('editBookModal');
        const editBookForm = document.getElementById('editBookForm');
        
        document.querySelectorAll('.editBookBtn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const judul = button.getAttribute('data-judul');
                const penulis = button.getAttribute('data-penulis');
                const penerbit = button.getAttribute('data-penerbit');
                const tahun = button.getAttribute('data-tahun');
                
                document.getElementById('editId').value = id;
                document.getElementById('editJudul').value = judul;
                document.getElementById('editPenulis').value = penulis;
                document.getElementById('editPenerbit').value = penerbit;
                document.getElementById('editTahun').value = tahun;
                
                editBookForm.action = `/dashboard/update/${id}`;
                
                const editBookModal = new bootstrap.Modal(editBookModalEl);
                editBookModal.show();
            });
        });
    });
</script>

<?= $this->endSection() ?>

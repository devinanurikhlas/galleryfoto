<!-- judul (card) -->
<div class="container-fluid mt-4">
    <h2 class="text-center">Data Album</h2>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahModal">
        <i class="bi bi-plus-circle"></i> + Tambah
    </button>

    <div class="row">
        <?php foreach ($DataAlbum as $album): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $album->nama_album; ?></h5>
                        <p class="card-text"><?php echo $album->deskripsi; ?></p>
                        <p class="card-text">Tanggal Dibuat: <?php echo $album->tanggal_dibuat; ?></p>
                        <p class="card-text">User ID: <?php echo $album->user_id; ?></p>
                    </div>
                    <div class="card-footer">
                        <!-- Tombol untuk membuka modal update -->
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#updateModal_<?php echo $album->album_id; ?>">
                            Update
                        </button>
                        <!-- Link untuk menghapus album -->
                        <a href="<?php echo site_url('Welcome/AlbumDelete/' . $album->album_id); ?>"
                            onclick="return confirm('Are you sure you want to delete this album?')"
                            class="btn btn-danger btn-sm">
                            Delete
                        </a>
                       
                    </div>
                </div>
            </div>

            <!-- Modal untuk menampilkan detail album -->
            <div class="modal fade" id="showModal_<?php echo $album->album_id; ?>" tabindex="-1" role="dialog"
                aria-labelledby="showModalLabel_<?php echo $album->album_id; ?>" aria-hidden="true">
                <!-- Isi modal detail album di sini -->
            </div>

            <!-- Modal untuk update album -->
            <div class="modal fade" id="updateModal_<?php echo $album->album_id; ?>" tabindex="-1" role="dialog"
                aria-labelledby="updateModalLabel_<?php echo $album->album_id; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel_<?php echo $album->album_id; ?>">Update
                                Album</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk update album -->
                            <form action="<?php echo site_url('Welcome/AlbumUpdate/' . $album->album_id); ?>"
                                method="POST">
                                <div class="form-group">
                                    <label for="nama_album">Nama Album</label>
                                    <input type="text" class="form-control" id="nama_album" name="nama_album"
                                        value="<?php echo $album->nama_album; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"
                                        rows="3" required><?php echo $album->deskripsi; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_dibuat">Tanggal Dibuat</label>
                                    <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat"
                                        value="<?php echo $album->tanggal_dibuat; ?>" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal untuk menambahkan album -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Album Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambahkan album -->
                <form action="<?php echo site_url('Welcome/AlbumInsert'); ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_album">Nama Album</label>
                        <input type="text" class="form-control" id="nama_album" name="nama_album" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_dibuat">Tanggal Dibuat</label>
                        <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

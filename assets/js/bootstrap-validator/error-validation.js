$('#validationAkun').bootstrapValidator({
  fields: {
    noAkun: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">No Akun tidak boleh kosong.</b>'
        }
      }
    },
    namaAkun: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama Akun tidak boleh kosong.</b>'
        }
      }
    },
  }
});
$('#validationPelanggan').bootstrapValidator({
  fields: {
    namaPelanggan: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama Pelanggan tidak boleh kosong.</b>'
        }
      }
    },
    noHp: {
      validators: {
        stringLength: {
          min: 12,
          max: 12,
          message: '<b class="text-danger">No HP tidak boleh lebih dari atau kurang dari 12 angka</b><br>'
        },
        notEmpty: {
          message: '<b class="text-danger">No HP tidak boleh kosong.</b>'
        }
      }
    },
    alamat: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Alamat tidak boleh kosong.</b>'
        }
      }
    },
  }
});
$('#validationBarang').bootstrapValidator({
  fields: {
    merkBarang: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Merk Barang tidak boleh kosong.</b>'
        }
      }
    },
    namaBarang: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama Barang tidak boleh kosong.</b>'
        }
      }
    },
    keterangan: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Keterangan tidak boleh kosong.</b>'
        }
      }
    },
  }
});
$('#validationPemasok').bootstrapValidator({
  fields: {
    namaPemasok: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama Pemasok tidak boleh kosong.</b>'
        }
      }
    },
    alamat: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Alamat tidak boleh kosong.</b>'
        }
      }
    },
  }
});
$('#validationDaftarPembelian').bootstrapValidator({
  fields: {
    idPemasok: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama Pemasok tidak boleh kosong.</b>'
        }
      }
    },
  }
});
$('#validationPembelian').bootstrapValidator({
  fields: {
    idBarang: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Nama Barang harus dipilih.</b>'
        }
      }
    },
    hargaBeli: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Harga tidak boleh kosong.</b>'
        }
      }
    },
    jumlah: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Jumlah tidak boleh kosong.</b>'
        }
      }
    },
  }
});
$('#validationUbahPembelian').bootstrapValidator({
  fields: {
    hargaBeli: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Harga tidak boleh kosong.</b>'
        }
      }
    },
    jumlah: {
      validators: {
        notEmpty: {
          message: '<b class="text-danger">Jumlah tidak boleh kosong.</b>'
        }
      }
    },
  }
});
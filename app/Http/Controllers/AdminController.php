<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Customer;
use App\DetailExpedisi;
use App\Expedisi;
use App\KategoriProduk;
use App\Kota;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function dashboard()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            return view('contens.dashboard');
        } else {
            return redirect('/');
        }
    }

    public function isLogin()
    {
        $isLogin = false;
        if (session::get('isLogin') === true) {
            $isLogin = true;
        }
        return $isLogin;
    }

    public function manageProfile()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $profile = new Profile();
            $data['profile'] = $profile->getProfile();;
            return view('contens.profile.profile', $data);
        } else {
            return redirect('/');
        }
    }

    public function updateProfile(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idProfile = $request->input('idProfile');
            $nama = $request->input('nama');
            $telepon = $request->input('telepon');
            $bbm = $request->input('bbm');
            $email = $request->input('email');
            $website = $request->input('website');
            $alamat = $request->input('alamat');
            $profile = new Profile();
            $profile->Prof_Id = $idProfile;
            $profile->Prof_Nama = $nama;
            $profile->Prof_Telepon = $telepon;
            $profile->Prof_Bbm = $bbm;
            $profile->Prof_Email = $email;
            $profile->Prof_Website = $website;
            $profile->Prof_Alamat = $alamat;
            $profile->doUpdate();
            session::flash('message', 'Profile berhasil diubah !');
            return redirect('manageProfile');
        } else {
            return redirect('/');
        }
    }

    public function manageAdmin()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
//            $listAdmin = new Admin();
            $data['listAdmin'] = Admin::all();
            return view('contens.admin.list_admin', $data);
        } else {
            return redirect('/');
        }
    }

    public function formTambahAdmin()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $admin = new Admin();
            $data['admin'] = $admin;
            $data['level'] = ['SUPER ADMIN', 'ADMIN'];
            return view('contens.admin.form_tambah_admin', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesTambahAdmin(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $nama = $request->input('nama');
            $username = $request->input('username');
            $password = $request->input('password');
            $level = $request->input('level');
            $admin = new Admin();
            $admin->Adm_Nama = $nama;
            $admin->Adm_Username = $username;
            $admin->Adm_Password = md5($password);
            $admin->Adm_Level = $level;
            $admin->doInsert();
            session::flash('message', 'Data berhasil ditambah !');
            return redirect('manageAdmin');
        } else {
            return redirect('/');
        }
    }

    public function formEditAdmin($idAdmin)
    {
        $a = new Admin();
        $admin = $a->getById($idAdmin);
        $data['level'] = ['SUPER ADMIN', 'ADMIN'];
        $data['admin'] = $admin;
        return view('contens.admin.form_edit_admin', $data);
    }

    public function prosesEditAdmin(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idAdmin = $request->input('idAdmin');
            $nama = $request->input('nama');
            $username = $request->input('username');
            $password = $request->input('password');
            $level = $request->input('level');
            $active = $request->input('active');
            $admin = new Admin();
            $admin->Adm_Id = $idAdmin;
            $admin->Adm_Nama = $nama;
            $admin->Adm_Username = $username;
            $admin->Adm_Level = $level;
            $admin->Adm_Active = $active;
            if (empty($password) === true) {
                $admin->Adm_Password = '';
            } else {
                $admin->Adm_Password = md5($password);
            }
            $admin->doUpdate();
            session::flash('message', 'Data berhasil diubah !');
            return redirect('manageAdmin');
        } else {
            return redirect('/');
        }
    }

    public function manageCustomer()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $customer = new Customer();
            $data['listCustomer'] = $customer->getAllCustomer();
            return view('contens.customer.list_customer', $data);
        } else {
            return redirect('/');
        }
    }

    public function formTambahCustomer()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $customer = new Customer();
            $data['customer'] = $customer;
            $data['tipe'] = ['MASTER DEALER', 'DEALER'];
            return view('contens.customer.form_tambah_customer', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesTambahCustomer(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $namaCustomer = $request->input('namaCustomer');
            $namaToko = $request->input('namaToko');
            $nomorContact = $request->input('nomorContact');
            $email = $request->input('email');
            $password = $request->input('password');
            $tipe = $request->input('tipe');
            $customer = new Customer();
            $customer->Cus_NamaCustomer = $namaCustomer;
            $customer->Cus_NamaToko = $namaToko;
            $customer->Cus_NomorContact = $nomorContact;
            $customer->Cus_Email = $email;
            $customer->Cus_Password = md5($password);
            $customer->Cus_Tipe = $tipe;
            $customer->doInsert();
            session::flash('message', 'Data berhasil ditambah !');
            return redirect('manageCustomer');
        } else {
            return redirect('/');
        }
    }

    public function formEditCustomer(int $idCustomer)
    {
        $cus = new Customer();
        $customer = $cus->getById($idCustomer);
        $data['tipe'] = ['MASTER DEALER', 'DEALER'];
        $data['customer'] = $customer;
        return view('contens.customer.form_edit_customer', $data);
    }

    public function prosesEditCustomer(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idCustomer = $request->input('idCustomer');
            $namaCustomer = $request->input('namaCustomer');
            $namaToko = $request->input('namaToko');
            $nomorContact = $request->input('nomorContact');
            $email = $request->input('email');
            $password = $request->input('password');
            $tipe = $request->input('tipe');
            $active = $request->input('active');
            $customer = new Customer();
            $customer->Cus_Id = $idCustomer;
            $customer->Cus_NamaCustomer = $namaCustomer;
            $customer->Cus_NamaToko = $namaToko;
            $customer->Cus_NomorContact = $nomorContact;
            $customer->Cus_Email = $email;
            if (empty($password) === true) {
                $customer->Cus_Password = '';
            } else {
                $customer->Cus_Password = md5($password);
            }
            $customer->Cus_Tipe = $tipe;
            $customer->Cus_Active = $active;
            $customer->doUpdate();
            session::flash('message', 'Data berhasil diubah !');
            return redirect('manageCustomer');
        } else {
            return redirect('/');
        }
    }

    public function manageKota()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $kota = new Kota();
            $data['listKota'] = $kota->getAllKota();
            return view('contens.kota.list_kota', $data);
        } else {
            return redirect('/');
        }
    }

    public function formTambahKota()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $kota = new Kota();
            $data['kota'] = $kota;
            return view('contens.kota.form_tambah_kota', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesTambahKota(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $nama = $request->input('nama');
            $cekNama = Kota::getByNama($nama);
            if ($cekNama === null) {
                $kota = new Kota();
                $kota->Kt_Nama = $nama;;
                $kota->doInsert();
                session::flash('message', 'Data berhasil ditambah !');
                return redirect('manageKota');
            } else {
                $data['kota'] = $cekNama;
                session::flash('message', 'Nama Kota sudah ada didatabase !');
                return view('contens.kota.form_tambah_kota', $data);
            }

        } else {
            return redirect('/');
        }
    }

    public function formEditKota($idKota)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $kota = new Kota();
            $data['kota'] = $kota->getById($idKota);
            return view('contens.kota.form_edit_kota', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesEditKota(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idKota = $request->input('idKota');
            $nama = $request->input('nama');
            $cekNama = Kota::getByNama($nama);
            $kot = Kota::getById($idKota);
            if ($nama !== $kot->Kt_Nama) {
                if ($cekNama === null) {
                    $kota = new Kota();
                    $kota->Kt_Id = $idKota;
                    $kota->Kt_Nama = $nama;
                    $kota->doUpdate();
                    session::flash('message', 'Data berhasil diubah !');
                    return redirect('manageKota');
                } else {
                    $kota = new Kota();
                    $kota->Kt_Id = $kot->Kt_Id;
                    $kota->Kt_Nama = $nama;
                    $data['kota'] = $kota;
                    session::flash('message', 'Nama Kota sudah ada didatabase !');
                    return view('contens.kota.form_edit_kota', $data);
                }
            } else {
                session::flash('message', 'Data berhasil diubah !');
                return redirect('manageKota');
            }
        } else {
            return redirect('/');
        }
    }

    public function manageExpedisi()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $expedisi = new Expedisi();
            $data['listExpedisi'] = $expedisi->getAllExpedisi();
            return view('contens.expedisi.list_expedisi', $data);
        } else {
            return redirect('/');
        }
    }

    public function formTambahExpedisi()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $expedisi = new Expedisi();
            $data['expedisi'] = $expedisi;
            return view('contens.expedisi.form_tambah_expedisi', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesTambahExpedisi(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $nama = $request->input('nama');
            $cekNama = Expedisi::getByNama($nama);
            if ($cekNama === null) {
                $expedisi = new Expedisi();
                $expedisi->E_NamaExpedisi = $nama;;
                $expedisi->doInsert();
                session::flash('message', 'Data berhasil ditambah !');
                return redirect('manageExpedisi');
            } else {
                $data['expedisi'] = $cekNama;
                session::flash('message', 'Nama expedisi sudah ada didatabase !');
                return view('contens.expedisi.form_tambah_expedisi', $data);
            }

        } else {
            return redirect('/');
        }
    }

    public function formEditExpedisi($idExpedisi)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $expedisi = new Expedisi();
            $data['expedisi'] = $expedisi->getById($idExpedisi);
            return view('contens.expedisi.form_edit_expedisi', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesEditExpedisi(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idExpedisi = $request->input('idExpedisi');
            $nama = $request->input('nama');
            $cekNama = Expedisi::getByNama($nama);
            $exp = Expedisi::getById($idExpedisi);
            if ($nama !== $exp->E_NamaExpedisi) {
                if ($cekNama === null) {
                    $expedisi = new Expedisi();
                    $expedisi->E_Id = $idExpedisi;
                    $expedisi->E_NamaExpedisi = $nama;
                    $expedisi->doUpdate();
                    session::flash('message', 'Data berhasil diubah !');
                    return redirect('manageExpedisi');
                } else {
                    $expedisi = new Expedisi();
                    $expedisi->E_Id = $exp->E_Id;
                    $expedisi->E_NamaExpedisi = $nama;
                    $data['expedisi'] = $expedisi;
                    session::flash('message', 'Nama expedisi sudah ada didatabase !');
                    return view('contens.expedisi.form_edit_expedisi', $data);
                }
            } else {
                session::flash('message', 'Data berhasil diubah !');
                return redirect('manageExpedisi');
            }

        } else {
            return redirect('/');
        }
    }

    public function manageDetailExpedisi()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $detailExpedisi = new DetailExpedisi();
            $data['listDetailExpedisi'] = $detailExpedisi->getAllExpedisi();
            return view('contens.expedisi.list_detail_expedisi', $data);
        } else {
            return redirect('/');
        }
    }

    public function formTambahDetailExpedisi()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $detailExpedisi = new DetailExpedisi();
            $data['detailExpedisi'] = $detailExpedisi;
            $expedisi = new Expedisi();
            $data['listExpedisi'] = $expedisi->getAllExpedisi();
            $data['via'] = ['Laut', 'Udara', 'Darat'];
            $kota = new Kota();
            $data['listKota'] = $kota->getAllKota();
            return view('contens.expedisi.form_tambah_detail_expedisi', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesTambahDetailExpedisi(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idExpedisi = $request->input('idExpedisi');
            $idKota = $request->input('idKota');
            $via = $request->input('via');
            $harga = $request->input('harga');
            $detailExpedisi = new DetailExpedisi();
            $detailExpedisi->De_IdExpedisi = $idExpedisi;
            $detailExpedisi->De_IdKota = $idKota;
            $detailExpedisi->De_NamaVia = $via;
            $detailExpedisi->De_Harga = $harga;
            $detailExpedisi->doInsert();
            session::flash('message', 'Data berhasil ditambah !');
            return redirect('manageDetailExpedisi');
        } else {
            return redirect('/');
        }
    }

    public function formEditDetailExpedisi($idDetailExpedisi)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $detailExpedisi = new DetailExpedisi();
            $De = $detailExpedisi->getById($idDetailExpedisi);
            $data['detailExpedisi'] = $De;
            $expedisi = new Expedisi();
            $data['listExpedisi'] = $expedisi->getAllExpedisi();
            $data['via'] = ['Laut', 'Udara', 'Darat'];
            $kota = new Kota();
            $data['listKota'] = $kota->getAllKota();
            return view('contens.expedisi.form_edit_detail_expedisi', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesEditDetailExpedisi(Request $request)
    {
        $idDetailExpedisi = $request->input('idDetailExpedisi');
        $idExpedisi = $request->input('idExpedisi');
        $idKota = $request->input('idKota');
        $via = $request->input('via');
        $harga = $request->input('harga');
        $detailExpedisi = new DetailExpedisi();
        $detailExpedisi->De_Id = $idDetailExpedisi;
        $detailExpedisi->De_IdExpedisi = $idExpedisi;
        $detailExpedisi->De_IdKota = $idKota;
        $detailExpedisi->De_NamaVia = $via;
        $detailExpedisi->De_Harga = $harga;
        $detailExpedisi->doUpdate();
        session::flash('message', 'Data berhasil diubah !');
        return redirect('manageDetailExpedisi');
    }

    public function manageKategoriProduk()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $kategoriProduk = new KategoriProduk();
            $data['listKategoriProduk'] = $kategoriProduk->getAllKategoriProduk();
            return view('contens.kategoriproduk.list_kategori_produk', $data);
        } else {
            return redirect('/');
        }
    }

    public function formTambahKategoriProduk()
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $kategoriProduk = new KategoriProduk();
            $data['kategoriProduk'] = $kategoriProduk;
            return view('contens.kategoriproduk.form_tambah_kategori_produk', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesTambahKategoriProduk(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $nama = $request->input('namaKategoriProduk');
            $cekNama = KategoriProduk::getByNama($nama);
            if ($cekNama === null) {
                $kategoriProduk = new KategoriProduk();
                $kategoriProduk->Kp_NamaKategori = $nama;;
                $kategoriProduk->doInsert();
                session::flash('message', 'Data berhasil ditambah !');
                return redirect('manageKategoriProduk');
            } else {
                $data['kategoriProduk'] = $cekNama;
                session::flash('message', 'Nama Kategori Produk sudah ada didatabase !');
                return view('contens.kategoriproduk.form_tambah_kategori_produk', $data);
            }

        } else {
            return redirect('/');
        }
    }

    public function formEditKategoriProduk($idKategoriProduk)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $kategoriProduk = new KategoriProduk();
            $data['kategoriProduk'] = $kategoriProduk->getById($idKategoriProduk);
            return view('contens.kategoriproduk.form_edit_kategori_produk', $data);
        } else {
            return redirect('/');
        }
    }

    public function prosesEditKategoriProduk(Request $request)
    {
        $isLogin = $this->isLogin();
        if ($isLogin === true) {
            $idKategoriProduk = $request->input('idKategoriProduk');
            $nama = $request->input('namaKategoriProduk');
            $cekNama = KategoriProduk::getByNama($nama);
            $kategori = KategoriProduk::getById($idKategoriProduk);
            if ($nama !== $kategori->Kp_NamaKategori) {
                if ($cekNama === null) {
                    $kategoriProduk = new KategoriProduk();
                    $kategoriProduk->Kp_Id = $idKategoriProduk;
                    $kategoriProduk->Kp_NamaKategori = $nama;
                    $kategoriProduk->doUpdate();
                    session::flash('message', 'Data berhasil diubah !');
                    return redirect('manageKategoriProduk');
                } else {
                    $kategoriProduk = new KategoriProduk();
                    $kategoriProduk->Kp_Id = $kategori->Kp_Id;
                    $kategoriProduk->Kp_NamaKategori = $nama;
                    $data['kategoriProduk'] = $kategoriProduk;
                    session::flash('message', 'Nama Kategori Produk sudah ada didatabase !');
                    return view('contens.kategoriproduk.form_edit_kategori_produk', $data);
                }
            } else {
                session::flash('message', 'Data berhasil diubah !');
                return redirect('manageKategoriProduk');
            }
        } else {
            return redirect('/');
        }
    }
}

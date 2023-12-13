<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    //Mahasiswa

    public function showMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function createMahasiswa()
    {
        return view('admin.mahasiswa.tambah');
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'password' => 'required',
            'tahun_masuk' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $encryptedPassword = bcrypt($request->password);

        // Create unique filename based on the mahasiswa's name
        $filename = str_replace(' ', '_', $request->nama) . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();

        // Store the Mahasiswa's foto in the 'imagesMahasiswa' folder
        $fotoPath = $request->file('foto')->storeAs('imagesMahasiswa', $filename, 'public');

        // Create data array with encrypted password and default role
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'password' => $encryptedPassword,
            'role' => 'mahasiswa', // Set default role to 'mahasiswa'
            'tahun_masuk' => $request->tahun_masuk,
            'foto' => $fotoPath, // Save the path to the database
        ];

        // Store the Mahasiswa
        Mahasiswa::create($data);

        // Redirect with success message
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambah');
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $id,
            'nama' => 'required',
            'password' => '', // 'sometimes' means the field is only validated if it is present in the request
            'tahun_masuk' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate foto as an image if present
        ]);

        // Find the Mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Update the Mahasiswa's data
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->tahun_masuk = $request->tahun_masuk;

        // Update the password if it is present in the request
        if ($request->filled('password')) {
            $encryptedPassword = bcrypt($request->password);
            $mahasiswa->password = $encryptedPassword;
        }

        // Update the foto if it is present in the request
        if ($request->hasFile('foto')) {
            // Create unique filename based on the mahasiswa's name
            $filename = str_replace(' ', '_', $request->nama) . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();

            // Store the updated Mahasiswa's foto in the 'imagesMahasiswa' folder
            $fotoPath = $request->file('foto')->storeAs('imagesMahasiswa', $filename, 'public');

            // Set the updated foto path
            $mahasiswa->foto = $fotoPath;
        }

        // Save the updated Mahasiswa
        $mahasiswa->save();

        // Redirect with success message
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui');
    }

    public function destroyMahasiswa($id)
    {
        // Temukan data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus file foto lama jika ada
        if (Storage::disk('public')->exists($mahasiswa->foto)) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        // Hapus data mahasiswa
        $mahasiswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }

    //Dosen

    public function showDosen(Request $request)
    {
        $search = $request->input('search');

        $dosen = Dosen::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->get();

        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function createDosen()
    {
        return view('admin.dosen.tambah');
    }

    public function storeDosen(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'name' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jabatan' => 'required',
            'bidang_keahlian' => 'required',
        ]);


        $encryptedPassword = bcrypt($request->password);

        // Create unique filename based on the mahasiswa's name
        $filename = str_replace(' ', '_', $request->nama) . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();

        // Store the Mahasiswa's foto in the 'imagesMahasiswa' folder
        $fotoPath = $request->file('foto')->storeAs('imagesDosen', $filename, 'public');

        // Create data array with encrypted password and default role
        $data = [
            'nidn' => $request->nidn,
            'name' => $request->name,
            'password' => $encryptedPassword,
            'role' => 'dosen', // Sesuaikan dengan inputan atau set default sesuai kebutuhan
            'foto' => $fotoPath, // Simpan jalur foto ke database
            'jabatan' => $request->jabatan,
            'bidang_keahlian' => $request->bidang_keahlian,
        ];

        // Store the Mahasiswa
        Dosen::create($data);

        // Redirect with success message
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambah');
    }

    public function editDosen($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nidn' => 'required|unique:dosen,nidn,' . $id,
            'password' => '',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jabatan' => 'required',
            'bidang_keahlian' => 'required',
        ]);

        // Find the Mahasiswa by ID
        $dosen = Dosen::findOrFail($id);

        // Update the Mahasiswa's data
        $dosen->name = $request->name;
        $dosen->nidn = $request->nidn;
        $dosen->jabatan = $request->jabatan;
        $dosen->bidang_keahlian = $request->bidang_keahlian;

        // Update the password if it is present in the request
        if ($request->filled('password')) {
            $encryptedPassword = bcrypt($request->password);
            $dosen->password = $encryptedPassword;
        }

        // Update the foto if it is present in the request
        if ($request->hasFile('foto')) {
            // Create unique filename based on the mahasiswa's name
            $filename = str_replace(' ', '_', $request->name) . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();

            // Store the updated Mahasiswa's foto in the 'imagesMahasiswa' folder
            $fotoPath = $request->file('foto')->storeAs('imagesDosen', $filename, 'public');

            // Set the updated foto path
            $dosen->foto = $fotoPath;
        }

        // Save the updated Mahasiswa
        $dosen->save();

        // Redirect with success message
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diperbarui');
    }

    public function destroyDosen($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus');
    }

    //admin

    public function showAdmin()
    {
        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }

    public function createAdmin()
    {
        return view('admin.admin.tambah');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:admin,nip',
            'password' => 'required',
        ]);

        $encryptedPassword = bcrypt($request->password);

        // Create data array with encrypted password and default role
        $data = [

            'name' => $request->name,
            'nip' => $request->nip,
            'password' => $encryptedPassword,
            'role' => 'admin', // Set default role to 'admin'
        ];

        // Store the Mahasiswa
        Admin::create($data);

        // Redirect with success message
        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil ditambah');
    }

    public function editAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    public function updateAdmin(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'nip' => 'required|unique:admin,nip,' . $id,
            'password' => '',
        ]);

        // Find the Mahasiswa by ID
        $admin = Admin::findOrFail($id);

        // Update the Mahasiswa's data
        $admin->name = $request->name;
        $admin->nip = $request->nip;

        // Update the password if it is present in the request
        if ($request->filled('password')) {
            $encryptedPassword = bcrypt($request->password);
            $admin->password = $encryptedPassword;
        }

        // Save the updated Mahasiswa
        $admin->save();

        // Redirect with success message
        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil diperbarui');
    }

    public function destroyAdmin($id)
    {
        // Temukan data admin
        $admin = Admin::findOrFail($id);

        // Hapus data admin
        $admin->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil dihapus');
    }

    //Tugas Akhir
    public function showTa()
    {
        //$tugasakhir = TugasAkhir::all();
        return view('admin.tugasakhir.index', compact('tugasakhir'));
    }
}

<?php 

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;


class UserController extends Controller{

	function homeIndex(){
		$data['list_user'] = user::all();
		return view ('user.index', $data);

	}

	function index(){
		$data['list_user'] = user::withCount('produk')->get();
		return view ('user.index', $data);

	}

	function create(){
		return view ('User.create');

	}
 
	function store(){
		$user = new User;
		$user->nama = request('nama');
		$user->username = request('username');
		$user->email = request('email');
		$user->password = request('password');
		$user->jenis_kelamin = 1;
		$user->save();

		$userDetail = new UserDetail;
		$userDetail->id_user = $user->id;
		$userDetail->no_handphone = request('no_handphone');
		$userDetail->save();


		return redirect('admin/user')->with('success', 'Data Berhasil Ditambahkan');

	}

	function show(User $user){
		$data['user'] = $user;
		return view('user.show', $data);
	}

	function edit(User $user){
		$data['user'] = $user;
		return view('user.edit', $data);
	}

	function update(User $user){
		$user->nama = request('nama');
		$user->username = request('username');
		$user->email = request('email');
		if(request('password')) 
		$user->password = bcrypt(request('password'));
		$user->save();


		return redirect('admin/user')->with('success', 'Data Berhasil Diedit');
		
	}

	function destroy(User $user){
		$user->delete();


		return redirect('admin/user')->with('danger', 'Data Berhasil Dihapus');
	}

	function filter (){
		$nama = request('nama');
		$stok = explode(", ", request('stok'));
		//$data['harga_min'] = $harga_min = request ('harga_min');
		//$data['harga_max'] = $harga_max = request ('harga_max');
		//select * from produk where nama = $nama
		//$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
		$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();

		//$data['list_produk'] = Produk::where('stok', '<>', $stok)->get();
		//$data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();

		//$data['list_produk'] = Produk::whereNull('stok')->get();
		//$data['list_produk'] = Produk::whereNotNull('stok')->get();

		//$data['list_produk'] = Produk::whereDate('created_at', '2020-11-22')->get();
		//$data['list_produk'] = Produk::whereYear('created_at', '2020')->get();
		//$data['list_produk'] = Produk::whereMonth('created_at', '11')->get();
		//$data['list_produk'] = Produk::whereTime('created_at', '03:37:34')->get();
		//$data['list_produk'] = Produk::whereDate('created_at', ['2020-11-14', '2020-11-22'])->get();

        //$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereNotIn('stok', [50])->whereYear('created_at', '2020')->get();



		$data['nama'] = $nama;
		$data['stok'] = request ('stok');


		return view('home', $data);
	}


}
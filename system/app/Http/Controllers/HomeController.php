<?php 

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Provinsi;

class HomeController extends Controller{


	function showBeranda (){
		return view ('beranda');
	}

	function showProduk (){
		return view ('produk');
	}

	function showKategori (){
		return view ('kategori');
	}

	function test($produk, $hargaMin = 0, $hargaMax = 0){
		if($produk == 'payung'){
			echo "Tampilkan Produk Payung";
		}elseif($produk == 'sepeda'){
			echo "Produk Sepeda";
		}

		echo "<br>";
		echo "Harga Min adalah $hargaMin <br>";
		echo "Harga Max adalah $hargaMax <br>";
	}

	public function testCollection()
	{
		$list_bike = ['Honda', 'Yamaha', 'Kawasaki', 'Suzuki', 'Vespa', 'BMW', 'KTM'];
		$list_bike = collect($list_bike);
		$list_produk = Produk::all();

		// Sorting
		// Sort by harga terendah
		// dd($list_produk->sortBy('harga'));
		// Sort by harga tertinggi
		// dd($list_produk->sortByDesc('harga')); 
		//$data['list'] = $list_produk;
		//return view ('test-collection', $data);

		
		// map 

		//$map = $list_produk->map(function($item){
			//dd($item);
			//$item->stok = $item->stok+10;
			//return $item->item;
			//$result['nama'] = $item->nama;
			//$result['harga'] = $item->harga;
			//return $result;
		//});

		// each
		//foreach($list_produk as $item){
		//	echo "$item->nama<br>";
		//}
		// $list_produk->each(function($item){
		// 	echo "$item->nama<br>";

		// });

		// Filter

		//$filtered = $list_produk->filter(function($item){
		//	return $item->harga > 200000;
		//});

		//dd($filtered);



		//dd($map);
		//dd($list_bike, $collection, $list_produk);

		// Sum, max, min, average
		// $sum = $list_produk->sum('stok');
		// dd($sum);

		$data['list'] = Produk::Paginate(5);
		return view ('test-collection', $data);

		dd($list_bike, $list_produk);
	
	}

	function testAjax(){
		$data['list_provinsi'] = Provinsi::all();
		return view('test-ajax', $data);
	}
}
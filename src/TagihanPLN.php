<?php namespace PLN;

class TagihanPLN {

	private $id_pelanggan 	= 0;
	private $bulan_tagihan	= 0;
	private $tahun_tagihan	= 0;
	private $result 		= array();

	function __construct($idpel="") 
	{
		$this->id_pelanggan = $idpel;
	}

	public function setIDPel($idpel)
	{
		$this->id_pelanggan = $idpel;
	}

	public function setBulan($bulan)
	{
		$this->bulan_tagihan = $bulan;
	}

	public function setTahun($tahun)
	{
		$this->tahun_tagihan = $tahun;
	}

	public function getResult()
	{
		// data
		$thn = (!empty($this->tahun_tagihan) ? $this->tahun_tagihan : date("Y")); // tahun (optional. Default: tahun sekarang)
		$bln = (!empty($this->bulan_tagihan) ? $this->bulan_tagihan : date("m")); // bulan (optional. Default: bulan sekarang)
		$idp = $this->id_pelanggan;

		// curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, 'http://layanan.pln.co.id/ebill/FormInfoRekening/trans');
		curl_setopt($ch, CURLOPT_REFERER, 'http://layanan.pln.co.id/ebill/');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
			'Content-Type: text/x-gwt-rpc; charset=utf-8',
			'X-GWT-Permutation: C6BB3F692785D0860C3C38B6C5A8FB24',
			'X-GWT-Module-Base: http://layanan.pln.co.id/ebill/FormInfoRekening/'
		));
		curl_setopt($ch, CURLOPT_POSTFIELDS, '7|0|7|http://layanan.pln.co.id/ebill/FormInfoRekening/|31FCED6DBB5E158989E9AD8E99085D6D|com.iconplus.client.services.TransService|getInvoiceByIdpelThblrek|java.lang.String/2004016611|'.$idp.'|'.$thn.$bln.'|1|2|3|4|2|5|5|6|7|');   
		if(!$data = curl_exec($ch)){
			
			// website yang di cURL sedang offline
			$this->result['status'] = 'error';
			$this->result['pesan'] = 'offline';
		}else{
			curl_close($ch);
			
			// manipulasi dom
			$data = str_replace(array('//OK', '"', '],0,7]', 'rp'), '', $data);
			$data = str_replace('tag', 'tagihan', $data);
			$data = str_replace(array('   ', '  '), ' ', $data);
			$data = preg_replace("/\[[^>]+\[/i", "", $data);
			
			// create array
			$array = explode(',', $data);
			
			// data ada
			if(count($array) > 5){
				
				// daftar nama key yang value.y harus integer
				$integer = array(
					'thblrek',
					'lwbp',
					'beban',
					'bpju',
					'ptl',
					'idpel',
					'sahlwbp',
					'daya',
					'slalwbp',
					'pemkwh',
					'tglbacaakhir',
					'tglbacalalu',
					'ketlunas',
					'tagihan'
				);
				
				// daftar nama key yang value.y harus string
				$string = array(
					'diskon',
					'angsuran',
					'fakmkvam',
					'slawbp',
					'nama',
					'namaupi',
					'fjn',
					'jamnyala',
					'namathblrek',
					'terbilang',
					'wbp',
					'alamat',
					'tarif'
				);
				
				// array to object
				$object = new \stdClass();
				foreach ($array as $key => $value)
				{
					if(in_array($value, $integer)){
						$object->$value = (intval($array[$key + 1]) ? $array[$key + 1] : '');
					}else if(in_array($value, $string)){
						$object->$value = (intval($array[$key + 1]) ? '' : $array[$key + 1]);
					}
				}
				$this->result['status'] = 'success';
				$this->result['query'] = array(
					'id_pelanggan' => $idp,
					'tahun' => $thn,
					'bulan' => $bln
				);
				$this->result['data'] = $object;
			}else{
			
				// data tidak ada
				$this->result['status'] = 'error';
				$this->result['pesan'] = 'data tidak ada';
			}

			return $this->result;
		}
	}

	public function getResultAsJSON()
	{
		return json_encode($this->getResult());
	}

}
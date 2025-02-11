<?php

class M_penjualan extends CI_Model {
	protected $_table = 'penjualan';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	//public function jumlah(){
		//$query = $this->db->get($this->_table);
		//return $query->num_rows();
	//}

	public function jumlah() {
        $query = $this->db->query("select sum(ceil(a.harga_barang*a.jumlah_barang)) as total from detail_penjualan a join penjualan b on a.no_penjualan=b.no_penjualan");
        if ($query) {
            return $query->row()->total;
        } else {
            return false;
        }
    }

	public function lihat_no_penjualan($no_penjualan){
		return $this->db->get_where($this->_table, ['no_penjualan' => $no_penjualan])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_penjualan){
		return $this->db->delete($this->_table, ['no_penjualan' => $no_penjualan]);
	}
}
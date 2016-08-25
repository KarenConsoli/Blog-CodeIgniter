<?php  
	/**
	* Backend Model By Fathan Rohman
	*/
	class Crud_model extends CI_Model
	{
		public function get_all()
		{
			$query=$this->db->get('crud');
			$data=$query->result();
			return $data;
		}

		public function get_all_by_limit($limit,$start)
		{
			return $this->db->get('crud', $limit,$start);
		}

		public function get_by_id($data)
		{
			$this->db->where($data);
			$q=$this->db->get('crud');
			
			$data=$q->first_row();
			return $data;
		}

		public function get_by_id_galery($data)
		{
			$this->db->where('id',$data);
	        $query = $this->db->get('images');
	        return $query;
		}

		public function save_data($data)
		{
			$save_data = $this->db->insert('crud',$data);
			if($save_data){
				return redirect ('crud/');
			}else{
				return redirect ('crud/input');
			}
		}

		public function delete_data($data)
		{
			$delete = $this->db->delete('crud',$data);
        		return $delete;
		}

		public function update_data($id, $image)
		{
			$this->db->set('blog_image',$image);
			$this->db->where('blog_id',$id);
			$update_data = $this->db->update('tbl_blog');
			return $update_data;
		}



		// buat galeri 
		public function show($table){
			$this->db->select('*');
			$data = $this->db->get($table);
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}

		public function insert($data,$table){
			$this->db->insert($table, $data);
		}

		public function delete_data_images($data)
		{
			$row = $this->get_by_id_galery($data)->row()->name;
        	return unlink('./blog_images/'.$row);
		} 
		// buat galeri 
	}
?>
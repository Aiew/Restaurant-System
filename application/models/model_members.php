<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_members extends CI_Model {

	/***
	***		Setting [Begin]
	***/

	// Get profile
	public function get_profile(){
		$this->db->where('id', $this->session->userdata('id'));
		$fetch_user = $this->db->get('user_profiles');
		$data = array(
			'firstname' => $fetch_user->row()->first_name,
			'lastname' => $fetch_user->row()->last_name,
			'gender' => $fetch_user->row()->gender,
			'born' => $fetch_user->row()->born,
			'phonenum' => $fetch_user->row()->phone_number,
			'about' => $fetch_user->row()->about,
			'image' => $fetch_user->row()->image
			);
		return $data;
	}

	// Upload Config Loader
	public function get_upload_config(){
		return array(
			// Change path when you upload to a live server
			'upload_path'   => "C:\wamp\www\ci\public\upload\img\profile",
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '1000',
            'max_width'     => '2000',
            'max_height'    => '2000',
            'encrypt_name'  => true
			);
	}
	// Update a upload and profiles table
	public function update_upload(){
		// Insert a Upload table
		$upload_data = $this->upload->data();
        $data_ary = array(
                'title'     => $upload_data['client_name'],
                'file'      => $upload_data['file_name'],
                'width'     => $upload_data['image_width'],
                'height'    => $upload_data['image_height'],
                'type'      => $upload_data['image_type'],
                'size'      => $upload_data['file_size'],
                'date'      => time(),
        );
        $this->db->insert('upload', $data_ary);

        // Check is default image or old image
        $this->db->where('id', $this->session->userdata('id'));
		$fetch_user = $this->db->get('user_profiles');
        if ($fetch_user->row()->image != 'default.gif'){
        	// Delete the old image
	        $this->do_delete_old_image();
        }
        

        // Update a profiles table
        $data = array(
        	'image' => $data_ary['file']
        	);
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('user_profiles', $data);

        // Resize image
        $this->do_profile_resize_image($data_ary);
        
        return $upload_data;
	}
	// Resize a image to 300 x 300 px
	public function do_profile_resize_image($data){
		//Your Image
		$imgSrc = 'public/upload/img/profile/' . $data['file'];
		
		//getting the image dimensions
		list($width, $height) = getimagesize($imgSrc);

		//saving the image into memory (for manipulation with GD Library)
		if ($data['type'] == "jpeg" || $data['type'] == "jpg")
			$myImage = imagecreatefromjpeg($imgSrc);
		else if ($data['type'] == "png")
			$myImage = imagecreatefrompng($imgSrc);
		else if ($data['type'] == "gij")
			$myImage = imagecreatefromgif($imgSrc);

		// calculating the part of the image to use for thumbnail
		if ($width > $height) {
		  $y = 0;
		  $x = ($width - $height) / 2;
		  $smallestSide = $height;
		} else {
		  $x = 0;
		  $y = ($height - $width) / 2;
		  $smallestSide = $width;
		}

		// copying the part into thumbnail
		$thumbSize = 300;
		$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
		imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

		//final output
		$thumbnail_path = 'public/upload/img/profile/thumbnail_' . $data['file'];
		if ($data['type'] == "jpeg" || $data['type'] == "jpg") {
			imagejpeg($thumb, $thumbnail_path);	
		}
		else if ($data['type'] == "png") {
			imagepng($thumb, $thumbnail_path);	
		}
		else if ($data['type'] == "gif") {
			imagegif($thumb, $thumbnail_path);	
		}

	}
	// Delete a old profile image
	public function do_delete_old_image(){
		$data = $this->get_profile();

		// Delete file
		$this->load->helper("file");
		$old_image_path = $data['image'];
		// Change path when you upload to a live server
		if ($old_image_path != 'default.gif') {
			unlink($_SERVER['DOCUMENT_ROOT']. 'ci/public/upload/img/profile/thumbnail_' .$old_image_path);
			unlink($_SERVER['DOCUMENT_ROOT']. 'ci/public/upload/img/profile/' .$old_image_path) ;
		}

		// Remove a file table in upload table
        $this->db->where('id', $this->session->userdata('id'));
        $fetch_image = $this->db->get('user_profiles')->row()->image;
        $this->db->where('file', $fetch_image);
        $this->db->delete('upload');	

		// Remove filename in profiles table 
		$temp_data = array(
			'image' => 'default.gif'
			);
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('user_profiles', $temp_data);	
	}

	// Update Profile
	public function update_profile(){
		$born_date = $this->input->post('year'). "-" .$this->input->post('months'). "-" .$this->input->post('days');
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('sex'),
			'born' => $born_date,
			'phone_number' => $this->input->post('phonenum'),
			'about' => $this->input->post('about')
			);
		
		$this->db->where('id', $this->session->userdata('id'));
		$fetch_user = $this->db->update('user_profiles', $data);
	}
	// Change Password  
	// Check for old password is correct?
	public function is_password_correct($password){
		$this->db->where('username', $this->session->userdata('username'));
		$fetch_user = $this->db->get('users');
		$salt = $fetch_user->row()->salt;
		$hash = $fetch_user->row()->password;
		
		if (sha1($salt.$password) == $hash) return true;
		else return false;
	}
	public function change_password(){		
		$this->load->model('model_functions');
		$newSalt = $this->model_functions->getRandomSalt();
		$data = array(
			'password' => sha1($newSalt.$this->input->post('cpassword')),
			'salt' => $newSalt
			);
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->update('users', $data);
	}
	// Delete account
	public function delete_account(){
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->delete('users'); 
	}
	/***
	***		Setting [End]
	***/




	/***
	***		Dashboard [Begin]
	***/

	// Get config in adding item
	/*public function get_config_adding_item(){
		$this->db->where('id', $this->session->userdata('id'));
		$fetch_user = $this->db->get('user_profiles');
		$data = array(
			'firstname' => $fetch_user->row()->first_name,
			'lastname' => $fetch_user->row()->last_name,
			'gender' => $fetch_user->row()->gender,
			'born' => $fetch_user->row()->born,
			'phonenum' => $fetch_user->row()->phone_number,
			'about' => $fetch_user->row()->about,
			'image' => $fetch_user->row()->image
			);
		return $data;
	}*/

	// Add item function 
	public function add_new_item(){

		// Looking for categories Handler
		$cate = array();
		foreach ($this->input->post('looking_for_item_category') as $i => $value){
			if ($value == 0) {
				$cate[0] = 0;
				break;
			} else if ($value >= 1 && $value <= 12) {
				array_push($cate, $value);
			} else {
				echo "Error categories input ";
				break;
			}
		}
		if ($cate[0] == 0 || sizeof($cate) >= 12) $serialize_categories = 0;
		else $serialize_categories = serialize( $cate );

		// Looking for price rate Handler
		$price = array();
		foreach ($this->input->post('looking_for_item_price_rate') as $i => $value){			
			if ($value >= 1 && $value <= 5) array_push($price, $value);
			else {
				echo "Error price rate input";
				break;				
			}
		}
		if (sizeof($price) == 5) $serialize_price = 0;
		else $serialize_price = serialize( $price );

		// How you exchange Handler
		$ways_exchange_insert = $this->input->post('looking_for_item_ways_exchange');
		$ways_exchange_location_insert = 0;
		if ($ways_exchange_insert == 1) {
			if ($this->input->post('looking_for_item_ways_exchange_1') == 2) $ways_exchange_location_insert = $this->input->post('ways_exchange_meet');
		}
		else if ($ways_exchange_insert == 2) {
			if ($this->input->post('looking_for_item_ways_exchange_2') == 2) $ways_exchange_location_insert = $this->input->post('ways_exchange_ems');
		}
		else {
			$ways_exchange_location_insert = 0;
		}


		// Insert to database
		$data_item = array(
			'owner_id'				=> $this->session->userdata('id'),
            'title'     			=> $this->input->post('title'),
            'category'  			=> $this->input->post('categories'),
            'image'     			=> '',
            'item_condition'    	=> $this->input->post('item_condition'),
            'item_price_rate'   	=> $this->input->post('item_price_rate'),
            'brand'      			=> $this->input->post('brand'),
            'model'      			=> $this->input->post('model'),
            'description'			=> $this->input->post('description'),
            'want_category'			=> $serialize_categories,
            'want_item_condition' 	=> $this->input->post('looking_for_item_condition'),
            'want_item_price_rate'	=> $serialize_price,
            'want_detail'			=> $this->input->post('want_detail'),
            'ways_exchange'			=> $ways_exchange_insert,
            'ways_exchange_location'=> $ways_exchange_location_insert,
            'status'				=> 1,
            'created_time'			=> time(),
            'updated_time'			=> time(),
            'expired_time'			=> 0
        );
        $this->db->insert('item', $data_item);
	}


	// Callback from members.php
	public function is_categories_correct($cate) {
		if ($cate != NULL) return true;
		else return false;
	}
	public function is_categories_lookingfor_correct($cate){
		if ($cate != NULL) return true;
		else return false;
	}
	public function is_pricerate_lookingfor_correct($price){
		if ($price != NULL) return true;
		else return false;
	}
	public function is_waysexchange_correct($ways) {
		if ($ways != NULL) {
			if ($ways == 1) {
				$value_1 = $this->input->post('looking_for_item_ways_exchange_1');
				if ($value_1 != NULL && $value_1 >= 1 && $value_1 <= 2 ) return true;
				else return false;
			}
			else if ($ways == 2) {
				$value_2 = $this->input->post('looking_for_item_ways_exchange_2');
				if ($value_2 != NULL && $value_2 >= 1 && $value_2 <= 2 ) return true;
				else return false;
			}
			else if ($ways == 3) return true;
			else return false;
		}
		else return false;
	}

	/***
	***		Dashboard [End]
	***/

}
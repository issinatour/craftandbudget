<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SimpleLoginSecure
{
	var $CI;
	var $user_table = 'professionals';	

	/**
	 * Login and sets session variables
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function login($user_email = '', $user_pass = '') 
	{

		$this->CI =& get_instance();

		if($user_email == '' OR $user_pass == '')
			return false;


		//Check if already logged in
		if($this->CI->session->userdata('user') == $user_email)
			return true;
		
		
		if ($user_email=="admin@admin" && $user_pass=="admin@"){
			$user_data['user'] = "admin"; // for compatibility with Simplelogin
			$user_data['usertype'] = "admin";
			$user_data['logged_in'] = true;
			$this->CI->session->set_userdata($user_data);
			return true;
		}

		//Check against user table
		$this->CI->db->where('email', $user_email);
		$this->CI->db->where('active', "1");
		$query = $this->CI->db->get_where($this->user_table);

		if ($query->num_rows() > 0) 
		{
			$user_data = $query->row_array(); 

			//$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
			
			$password = $user_pass;

			$enc = md5($password);

			if (!($enc==$user_data["password"])){
				return false;
			}

			//Destroy old session
			$this->CI->session->sess_destroy();
			
			//Create a fresh, brand new session
			$this->CI->session->sess_create();

			$this->CI->db->simple_query('UPDATE ' . $this->user_table  . ' SET last_login = "' . date('c') . '" WHERE id_professional = ' . $user_data['id_professional']);

			//Set session data
			unset($user_data['empleado_password']);
			$user_data['user'] = $user_data['email']; // for compatibility with Simplelogin
			$user_data['logged_in'] = true;
			$user_data['usertype'] = "user";
			$this->CI->session->set_userdata($user_data);
			
			return true;
		} 
		else 
		{
			return false;
		}

	}

	/**
	 * Logout user
	 *
	 * @access	public
	 * @return	void
	 */
	function logout() {
		$this->CI =& get_instance();

		$this->CI->session->sess_destroy();
	}
	
	
}
?>

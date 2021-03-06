<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * FreakAuth_light Class to handle the front controller
 * this class make code more reusable and it makes easier to 
 * integrate Freakauth_light in your on templating system
 *
 * The class requires the use of
 * 
 * => Database CI official library
 * => Db_session library (included in the download)
 * => FAL_validation library (included in the download)
 * => Freakauth_light library (included in the download)
 * => URL, FORM and FreakAuth_light (included in the download) helpers
 * 
 * ---------------------------------------------------------------------------------
 * Copyright (C) 2007  Daniel Vecchiato (4webby.com)
 * ---------------------------------------------------------------------------------
 *This library is free software; you can redistribute it and/or
 *modify it under the terms of the GNU Lesser General Public
 *License as published by the Free Software Foundation; either
 *version 2.1 of the License, or (at your option) any later version.
 *
 *This library is distributed in the hope that it will be useful,
 *but WITHOUT ANY WARRANTY; without even the implied warranty of
 *MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *Lesser General Public License for more details.
 *
 *You should have received a copy of the GNU Lesser General Public
 *License along with this library; if not, write to the Free Software
 *Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *-----------------------------------------------------------------------------------
 * @package     FreakAuth_light
 * @subpackage  Libraries
 * @category    Authentication
 * @author      Daniel Vecchiato (danfreak) & Christophe Gragnic (grahack)
 * @copyright   Copyright (c) 2007, 4webby.com
 * @license		http://www.gnu.org/licenses/lgpl.html
 * @link 		http://4webby.com/freakauth
 * @version 	1.0.4
 *
 */
class Fal_front 
{
	// --------------------------------------------------------------------
	/**
	 * class constructor
	 *
	 * @return Fal_front
	 */
	function Fal_front()
	{
		$this->CI = &get_instance();
		//loads necessary libraries
         $this->CI->lang->load('freakauth');
       // $this->CI->load->model('Usermodel');
	 //   if ($this->CI->config->item('FAL_use_country'))
        //    $this->CI->load->model('country', 'country_model');
        //lets load the validation class if it hasn't been already loaded
        //it is needed by the FAL_validation library
    //    if (!class_exists('CI_Validation'))
	///	{
		//     $this->CI->load->library('validation');
	//	}
		//let's load the FAL_validation library if it isn't already loaded
		//if (!class_exists('FAL_validation'))
	//	{
		     $this->CI->load->library('FAL_validation');
		//}
		
		//let's load the Freakauth_light library if it isn't already loaded
		//or autoloaded
		if (!class_exists('Freakauth_light'))
		{
		     $this->CI->load->library('Freakauth_light', 'freakauth_light');
		}
        
        
		$this->CI->fal_validation->set_error_delimiters($this->CI->config->item('FAL_error_delimiter_open'), $this->CI->config->item('FAL_error_delimiter_close'));
        
    }
	
    // --------------------------------------------------------------------

    /**
     * Displays the login form.
     * -------------------------
     * Usage:
     * -------------------------
     * //load the library in your controller
     * $this->load->library('FAL_front', 'fal_front');
     * 
     * $data['fal'] = $this->fal_front->login();  // <--assign it to a variable
     * $this->load->view('your_view', $data);  // <--pass it to your view
     * 
     * * -------------------------
     * Try also 
     * echo $this->fal_front->login();
     * -------------------------
     * Alternatively, You can also use the helper function displayLoginForm()
     * 
     * @return the login form view HTML output
     */
    function login()
    {	
    	//if an user, admin or superadmin is already logged in   
    	if($this->CI->freakauth_light->belongsToGroup('user'))
        {
         // Display user name and an 'already logged in' flash message...
        $msg = $this->CI->freakauth_light->getUserName().', '.$this->CI->lang->line('FAL_already_logged_in_msg');
        flashMsg($msg);

        //redirects to homepage    
        redirect ('', 'location');       

        }
        else
        {
            //sets the necessary form fields
            $fields['user_name'] = $this->CI->lang->line('FAL_user_name_label');
            $fields['password'] = $this->CI->lang->line('FAL_user_password_label');
            
            
            $rules['user_name'] = $this->CI->config->item('FAL_user_name_field_validation_login');
	        $rules['password'] = $this->CI->config->item('FAL_user_password_field_validation_login');
	        
	        //do we want chaptcha for login?
	        /*if ($this->CI->config->item('FAL_use_security_code_login'))
	        {
                $fields['security'] = $this->CI->lang->line('FAL_captcha_label');
	            $rules['security'] = $this->CI->config->item('FAL_user_security_code_field_validation');
	        }*/
	        
            //-----------------------------------------------
	        //ADD MORE FIELDS AND RULES HERE IF YOU NEED THEM
	        //-----------------------------------------------
	         
	        $this->CI->fal_validation->set_fields($fields);
	        $this->CI->fal_validation->set_rules($rules);
	        
	        //let's run the individual validation of username and password 
	        $validation_response = $this->CI->fal_validation->run();
	        
	        //if you change the keys of the validation rules
	        //remember to adjust the following 2 lines
	        //i.e. change $this->CI->fal_validation->user_name to $this->CI->fal_validation->your_user_name_key
	        $username_login = $this->CI->fal_validation->user_name;
	        $password_login = $this->CI->fal_validation->password;
	        
	        //everything went ok, let's log the user in and redirect him to the homepage
	        if ($validation_response==TRUE && $this->CI->fal_validation->login_check($username_login, $password_login) && $this->CI->freakauth_light->login())
	        {
	            $role= $this->CI->db_session->userdata('role');
	            
	            switch ($role)
	            {
	            	case ('superadmin'):
	            	case ('admin'):
	            		redirect($this->CI->config->item('FAL_admin_login_success_action'), 'location'); //On success redirect user to default page
	            		break;
	            		
	            	default:
	            		redirect($this->CI->config->item('FAL_login_success_action'), 'location'); //On success redirect user to default page
	            		break;
	            }
	        }
	        
	        //else display the login form again
	        else
	        {	
		        
		        if ($this->CI->config->item('FAL_use_security_code_login'))
		        {	
		        	$action='_login';
		            $this->CI->freakauth_light->captcha_init($action);
		            $data['captcha'] = $this->CI->config->item('FAL_security_code_image');
		        }
				
		        $data['heading'] = $this->CI->lang->line('FAL_login_label');
				return $this->CI->load->view($this->CI->config->item('FAL_login_view'), $data, TRUE);
				
				//$this->CI->output->enable_profiler(TRUE);
		    }
	    }       
    }

    // --------------------------------------------------------------------
    
    /**
     * Handles the logout action.
     *
     */
    function logout()
    {
        $this->CI->freakauth_light->logout();
    }
    
	// --------------------------------------------------------------------
	
    /**
     * Displays the registration form.
     * -------------------------
     * Usage:
     * -------------------------
     * //load the library in your controller
     * $this->load->library('FAL_front', 'fal_front');
     * 
     * $data['fal'] = $this->fal_front->register();  // <--assign it to a variable
     * $this->load->view('your_view', $data);  // <--pass it to your view
     * 
     * -------------------------
     * Try also 
     * echo $this->fal_front->register();
     * -------------------------
     * Alternatively, You can also use the helper function displayRegistrationForm()
     * 
     * @return the registration form view HTML output
     */
    function register()
    {	
    	//if users are not allowed to register
        if (!$this->CI->config->item('FAL_allow_user_registration'))
        {
        	redirect('', 'location');
        }
        //if they are allowed to register
        else
        {
            //sets the necessary form fields
            $fields['user_name'] = $this->CI->lang->line('FAL_user_name_label');
            $fields['password'] = $this->CI->lang->line('FAL_user_password_label');
            $fields['password_confirm'] = $this->CI->lang->line('FAL_user_password_confirm_label');
            $fields['email'] = $this->CI->lang->line('FAL_user_email_label');
            
            //if activated in config, sets the select country box
            if ($this->CI->config->item('FAL_use_country'))
        
            //set validation rules
            $rules['user_name'] = $this->CI->config->item('FAL_user_name_field_validation_register');
            $rules['password'] = $this->CI->config->item('FAL_user_password_field_validation_register');
            $rules['password_confirm'] = $this->CI->config->item('FAL_password_required_confirm_validation')."|matches[".'password'."]";
            $rules['email'] = $this->CI->config->item('FAL_user_email_field_validation_register');
        
        //do we also want to know the user country?
        if ($this->CI->config->item('FAL_use_country'))
        {
            $fields['country_id'] = $this->CI->lang->line('FAL_user_country_label');
            $rules['country_id'] = $this->CI->config->item('FAL_user_country_field_validation_register');
        }
        //do we also want to secure the registration with CAPTCHA?
        if ($this->CI->config->item('FAL_use_security_code_register'))
        {
            $fields['security'] = $this->CI->lang->line('FAL_captcha_label');
        	$rules['security'] = $this->CI->config->item('FAL_user_security_code_field_validation');
        }
        
        //-----------------------------------------------
        //ADD MORE FIELDS AND RULES HERE IF YOU NEED THEM
        //-----------------------------------------------
         
        $this->CI->fal_validation->set_fields($fields);
        $this->CI->fal_validation->set_rules($rules);
        
        //if everything went ok  
        if ($this->CI->fal_validation->run() && $this->CI->freakauth_light->register())
        {
			$data['heading'] = $this->CI->lang->line('FAL_register_label');
        	return $this->CI->load->view($this->CI->config->item('FAL_register_success_view'), $data, TRUE);
			//$this->CI->output->enable_profiler(TRUE);
        }
        
        //redisplay the register form
        else
        {	
        	//if we want to know the user country let's populate the select menu
	        if ($this->CI->config->item('FAL_use_country'))
	        {
	    		//SELECT * FROM country
	            $data['countries'] = $this->CI->country_model->getCountriesForSelect();
	        }
	        //if we want to secure the registration with CAPTCHA let's generate it
	        if ($this->CI->config->item('FAL_use_security_code_register'))
	        {	
	        	$action='_register';
	            $this->CI->freakauth_light->captcha_init($action);
	            $data['captcha'] = $this->CI->config->item('FAL_security_code_image');
	        }
		        
	        //displays the view
	        $data['heading'] = $this->CI->lang->line('FAL_register_label');
			return $this->CI->load->view($this->CI->config->item('FAL_register_view'), $data, TRUE);
			
			//$this->CI->output->enable_profiler(TRUE);
	
	        //$this->CI->db_session->flashdata_mark();
	        }
        }
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Handles the user activation.
     * -------------------------
     * Usage:
     * -------------------------
     * //load the library in your controller
     * $this->load->library('FAL_front', 'fal_front');
     * 
     * $data['fal'] = $this->fal_front->activation();  // <--assign it to a variable
     * $this->load->view('your_view', $data);  // <--pass it to your view
     * 
     * -------------------------
     * Try also 
     * echo $this->fal_front->activation();
     * -------------------------
     *
     * @return the activation view HTML output
     */
    function activation()
    {	
    	//passes the URI segments to freakauth-ligh [UserTemp id segment(3) and the activation code segment(4)]
    	//if the activation is successfull displays the success page 
        if ($this->CI->freakauth_light->activation($this->CI->uri->segment(3, 0), $this->CI->uri->segment(4, '')))
        {
        	$data['heading'] = $this->CI->lang->line('FAL_activation_label');
        	return $this->CI->load->view($this->CI->config->item('FAL_register_activation_success_view'), $data, TRUE);
        }
        //if activation unsuccessfull redispaly the failure view message
        else
        {	
        	$data['heading'] = $this->CI->lang->line('FAL_activation_label');
        	return $this->CI->load->view($this->CI->config->item('FAL_register_activation_failed_view'), $data, TRUE);
        }
        
    }
    
	// --------------------------------------------------------------------
	
    /**
     * Handles the the forgotten password form.
     * -------------------------
     * Usage:
     * -------------------------
     * //load the library in your controller
     * $this->load->library('FAL_front', 'fal_front');
     * 
     * $data['fal'] = $this->fal_front->forgotten_password();  // <--assign it to a variable
     * $this->load->view('your_view', $data);  // <--pass it to your view
     * 
     * -------------------------
     * Try also 
     * echo $this->fal_front->forgotten_password();
     * -------------------------
     *
     * @return the forgotten password view HTML output
     */
    function forgotten_password()
    {
        //sets the necessary form fields
        $fields['email'] = $this->CI->lang->line('FAL_user_email_label');
        
    	//set necessary validation rules
        $rules['email'] = $this->CI->config->item('FAL_user_email_field_validation_forgotten');
      	
        //do we also want CAPTCHA?
        if ($this->CI->config->item('FAL_use_security_code_forgot_password'))
        {
            $fields['security'] = $this->CI->lang->line('FAL_captcha_label');
            $rules['security'] = $this->CI->config->item('FAL_user_security_code_field_validation');
        }
        
        //-----------------------------------------------
        //ADD MORE FIELDS AND RULES HERE IF YOU NEED THEM
        //-----------------------------------------------
         
        $this->CI->fal_validation->set_fields($fields);
        $this->CI->fal_validation->set_rules($rules);
        
        //if it got post data and they validate display the success page
        if ($this->CI->fal_validation->run() && $this->CI->freakauth_light->forgotten_password())
        {        	
			return $this->CI->load->view($this->CI->config->item('FAL_forgotten_password_success_view'), null, TRUE);
        }
        
        //else display the initial forgotten password form 
        else
        {	
        	$this->CI->db_session->flashdata_mark();
        	
        	//do we want captcha
        	if ($this->CI->config->item('FAL_use_security_code_forgot_password'))
	        {
		        $action='_forgot_password';
            	$this->CI->freakauth_light->captcha_init($action);
		        $data['captcha'] = $this->CI->config->item('FAL_security_code_image');
	        }
            
	        //display the form
	        $data['heading'] = $this->CI->lang->line('FAL_forgotten_password_label');
			return $this->CI->load->view($this->CI->config->item('FAL_forgotten_password_view'), $data, TRUE);
        }
    }
    
	// --------------------------------------------------------------------
	
    /**
     * Displays the forgotten password reset.
     * -------------------------
     * Usage:
     * -------------------------
     * //load the library in your controller
     * $this->load->library('FAL_front', 'fal_front');
     * 
     * $data['fal'] = $this->fal_front->forgotten_password_reset();  // <--assign it to a variable
     * $this->load->view('your_view', $data);  // <--pass it to your view
     * 
     * -------------------------
     * Try also 
     * echo $this->fal_front->forgotten_password_reset();
     * -------------------------
     *
     * @return the forgotten password reset view HTML output
     */
    function forgotten_password_reset()
    {	
    	//if password has been successfully reset (randomly generate, ins in DB and sent to the user)
    	//display success
        if ($this->CI->freakauth_light->forgotten_password_reset($this->CI->uri->segment(3, 0), $this->CI->uri->segment(4, '')))
        {
			return $this->CI->load->view($this->CI->config->item('FAL_forgotten_password_reset_success_view'), null, TRUE);  
        }
        //tell the user about the problems and display unsuccess view
        else
        {
			return $this->CI->load->view($this->CI->config->item('FAL_forgotten_password_reset_failed_view'), null, TRUE);           
        }
            
    }

    
    // --------------------------------------------------------------------
    
    /**
     * Function that handles the change password procedure
     * needed to let the user set the password he wants after the
     * forgotten_password_reset() procedure
     * Displays the forgotten password reset.
     * -------------------------
     * Usage:
     * -------------------------
     * //load the library in your controller
     * $this->load->library('FAL_front', 'fal_front');
     * 
     * $data['fal'] = $this->fal_front->changepassword();  // <--assign it to a variable
     * $this->load->view('your_view', $data);  // <--pass it to your view
     * 
     * -------------------------
     * Try also 
     * echo $this->fal_front->changepassword();
     * -------------------------
     *
     * @return the change password view HTML output
     */
    function changepassword()
    {
        //sets the necessary form fields
        $fields['user_name'] = $this->CI->lang->line('FAL_user_name_label');
        $fields['old_password'] = $this->CI->lang->line('FAL_old_password_label');
        $fields['password'] = $this->CI->lang->line('FAL_new_password_label');
        $fields['password_confirm'] = $this->CI->lang->line('FAL_retype_new_password_label');
        $fields['security'] = $this->CI->lang->line('FAL_captcha_label');
        
        
        $rules['user_name'] = $this->CI->config->item('FAL_user_name_field_validation_login');
        //old password
        $rules['old_password'] = $this->CI->config->item('FAL_user_password_field_validation_login');
        //new password
        $rules['password'] = $this->CI->config->item('FAL_password_required_validation');  
        //new password confirmation
        $rules['password_confirm'] = $this->CI->config->item('FAL_password_required_confirm_validation');
        
        
        //-----------------------------------------------
        //ADD MORE FIELDS AND RULES HERE IF YOU NEED THEM
        //-----------------------------------------------
         
        $this->CI->fal_validation->set_fields($fields);
        $this->CI->fal_validation->set_rules($rules);
        
        //if it got post data and they validate display the success page
        if ($this->CI->fal_validation->run() && $this->CI->freakauth_light->_change_password())
        {        	
        	//set FLASH MESSAGE
            $msg = $this->CI->lang->line('FAL_change_password_success');
            flashMsg($msg);
                        
			redirect('', 'location');
        }
        
        //else display the initial change password form 
        else
        {	
			//page display
			$data['heading'] = $this->CI->lang->line('FAL_change_password_label');
			return $this->CI->load->view($this->CI->config->item('FAL_change_password_view'), $data, TRUE);
        }
    }
}
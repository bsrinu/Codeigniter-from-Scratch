<?php 
/* 
* Sends email with Gmail
*/
/**  Autocompletion
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Language $language
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Email $email
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * 
 * Add addtional libraries you wish
 * to use in your controllers here
 * 
 */
class Email extends CI_Controller {
	
	public function __construct()
	{
	   parent::__construct();
	   //Do your magic here
	}

	public function index()
	{
		// For next tutorial
		$this->load->view('newsletter');
	}
	
	public function send()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('newsletter');
			//exit();
		}
		else
		{
			// Passed validation. So send email
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			
			/**
			 * Sending the email
			 *
			 * $config array is in config/email.php
			 */
			
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from('amitavadg@gmail.com', 'Amitava Das Gupta');
			$this->email->to($email);
			$this->email->subject('Test Newsletter Signup Confirmation');
			$this->email->message("Dear $name,\n\nYou've now signed up!");
			
			// Manually added to the config.php file
			$path = $this->config->item('server_root');
			
			// Build the path to the attachment
			$file = $path . '/ci/attachments/newsletter1.txt';
			
			// Attach the file.
			$this->email->attach($file);
			
			if ($this->email->send())
			{
				$this->load->view('signup_confirmation_view');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
	}
}
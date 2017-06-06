<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<!-- <method_name> -->
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function __construct()
     {
          parent::__construct();
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
		  $this->load->helper('url');
		  $this->load->helper('directory');
		  $this->load->helper('path');		  
		  $this->load->library('form_validation');
		            
     }


	public function index()
	{		
		$this->load->view('header');
		$this->load->view('csv/csv_index');
		$this->load->view('footer');
	}

	public function send_email($to,$message)
	{
		//$to = 'samsudheen.saludheen.ext@nokia.com';

		$subject = 'Request for NIMS Group information - Reminder 2';

		$headers = "From:  samsudheen.saludheen.ext@nokia.com \r\n";
		$headers.= "Reply-To:  samsudheen.saludheen.ext@nokia.com \r\n";
		$headers.= 'Cc: ee-cloud@wipro.com' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		if(@mail($to,$subject,$message,$headers))
			echo 'Email has sent successfully.';
		else
			echo 'Email sending fail.';
		
	}

	public function csv_fetch()
	{
		
		if(isset($_POST["btn_login"])) 
		{
			$mimes = array('application/vnd.ms-excel','text/csv','text/tsv','application/octet-stream');
			
			if(in_array($_FILES['txt_filename']['type'],$mimes))
			{
				@move_uploaded_file($_FILES['txt_filename']['tmp_name'], BASEPATH.'uploads/'.$_FILES['txt_filename']['name']);
				$this->form_validation->set_rules('txt_filename', 'Document', 'required');
				
				$csvData	=	$this->csvimport->get_array(BASEPATH.'uploads/'.$_FILES['txt_filename']['name']);

				
				if($_POST['txt_opformat']=='List')
				{ 
					//echo "<pre>";print_r($csvData);echo "</pre>";

					foreach($csvData as $key => $value)
					{
					  $newarray[$value['Owner Email']][$key] = $value;
					}

					//echo "<pre>";print_r($newarray);echo "</pre>";
					foreach($newarray as $k => $val)
					{ 
						$message="<!DOCTYPE ><html><head><style>table {    font-family: arial, sans-serif;    border-collapse: collapse;    width: 100%;}td, th {    border: 1px solid #dddddd;    text-align: left;    padding: 8px;}tr:nth-child(even) {    background-color: #dddddd;}</style></head><body>Dear User,<p>Greetings from EE-Cloud Team</p><p>We have observed that the below mentioned EE Cloud Group accounts are owned by you/your team. As per our new policy each EE Cloud Group Account should be owned by a NIMS Group, defined in Nokia Identity Management System (NIMS). NIMS Group is used for communication and access control purposes in EE Cloud tools, but not in EE Cloud instances.</p><p>Your EE Cloud Group Accounts do not have NIMS Group in the below clouds yet</p><table class='w3-table w3-striped w3-border'><tr><th>Cloud Name</th><th>Account Name</th></tr>";
						
						echo $k.'<br>';
						foreach($val as $k1 => $val1)
						{	
							$message.="<tr>";
							//echo $val1['Account'].'-'.$val1['Cloud'].'<br>';
							$message.="<td>".$val1['Cloud']."</td><td>".$val1['Account']."</td>";
							$message.="</tr>";
						}
						
						$message.="</table><p>So we request the EE Cloud Group Account owners to update their respective group's information.</p><p>You can use your existing NIMS Group or register a new one in NIMS.</p><p> Please follow the instructions and comment, if you have any questions.<a href='https://confluence.int.net.nokia.com/display/EECloud/EE+Cloud+Group+Accounts'>https://confluence.int.net.nokia.com/display/EECloud/EE+Cloud+Group+Accounts</a><p><p><b>Kindly ignore this email if this is already done. </b></p>Regards,<br>EE-Cloud Team";
						echo $message.'<br>';
						$this->send_email($k,$message);
					}
						

				}
				else
				{
				### BELOW ARGS USED FOR FILTERS
				$args = array(
					'name'   => FILTER_UNSAFE_RAW,
					'address' => '',
					'stars'    => array('filter'    => FILTER_VALIDATE_INT,
								   'options'   => array('min_range' => 1, 'max_range' => 5)
								   ),			
					'contact' => '',
					'phone' => '',
					'uri'     => FILTER_VALIDATE_URL
					);	
			
				foreach($csvData as $key=>$val)
				{
					
					$myinputs = filter_var_array($val, $args);
					//$string = str_replace('�','',$val['name']);
					//$encoding = "UTF-8";
					//if ( true === mb_check_encoding ( $string, $encoding ) )
					//{
						
						if(!array_search("", $myinputs) !== false)
						{
							//echo '<pre>';print_r($myinputs);echo '</pre>';	
							$validArray[]	=	$myinputs;
						}
					//}
				}

				//echo '<pre>';print_r($validArray);die;

				// CONVERT THE DATA IN TO JSON
				if($_POST['txt_opformat']=='Json')
					$this->downloadJson($validArray);
				
				// CONVERT THE DATA IN TO XML
				if($_POST['txt_opformat']=='XML')
					$this->downloadXML($validArray);

				
				// CONVERT THE DATA IN TO LIST
				if($_POST['txt_opformat']=='List')
				{
					print_r($myinputs);
				}
				}
				
			} 
			else 
			{
				$data["message"] = 'File type mismatch, Only CSV format allowed';
				$this->load->view('header');
				$this->load->view('csv/csv_index',$data);
				$this->load->view('footer');
			}
			
		}
		

	}


	public function downloadJson($jsonArray)
	{
		$downloadPath	=	BASEPATH.'downloads/';
		$fileName	=	$downloadPath.'results.json';
		$jsonData	=	json_encode($jsonArray);
		// WRITE THE CONTENT IN TO A FILE
		$fp = fopen($fileName, 'w');
		fwrite($fp, json_encode($jsonData));
		fclose($fp);

		// DOWNLOAD THE FILE
		@header('Content-disposition: attachment; filename=op.json');
		@header('Content-type: application/json');
		echo $jsonData;
	}


	

	public function downloadXML($validArray)
	{
		
		//creating object of SimpleXMLElement
		$xml_hotel_info = new SimpleXMLElement("<?xml version=\"1.0\"?><hotel_info></hotel_info>");

		
		$this->array_to_xml($validArray,$xml_hotel_info);
		$fileName	=	BASEPATH.'downloads/hotels.xml';
		
		$xml_file = $xml_hotel_info->asXML(BASEPATH.'downloads/hotels.xml');

		
		if($xml_file)
		{
			// DOWNLOAD THE FILE
			@header('Content-disposition: attachment; filename=op.xml');
			@header('Content-type: application/xml');
			readfile($fileName);
		}
		else
		{
			echo 'XML file generation error.';
		}
	}

	public function array_to_xml($users_array,$xml_hotel_info)
	{
		foreach($users_array as $key => $value) 
		{
			if(is_array($value)) 
			{
				if(!is_numeric($key))
				{
					$subnode = $xml_hotel_info->addChild("$key");
					$this->array_to_xml($value, $subnode);
				}
				else
				{
					$subnode = $xml_hotel_info->addChild("item$key");
					$this->array_to_xml($value, $subnode);
				}
			}
			else 
			{
				$xml_hotel_info->addChild("$key",htmlspecialchars("$value"));
			}
		}
	}

	
	

}

/* End of file csv.php */
/* Location: ./application/controllers/csv.php */
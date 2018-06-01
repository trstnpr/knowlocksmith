<?php

	class App extends CI_Controller {

		public function __construct()
        {
                parent::__construct();

                $this->load->helper('general');
                $this->load->helper('googleapi');
				$this->load->model('State_model');
				$this->load->model('City_model');
				$this->load->model('Page_model');
				$this->load->model('Configuration_model');
        }

		public function index($page = 'home') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				
				$data['term'] = 'locksmith';
				$data['location'] = '';

				$location = 'location=34.0522342,-118.2436849';
				$keyword = 'keyword=Los+Angeles,+CA';

				$data['google'] = google_places($location, $keyword);
				$gdata = $data['google'];

				$data['title'] = the_config('site_title');
				// META
				$data['meta_title'] = the_config('meta_title');
				$data['meta_keyword'] = the_config('meta_keyword');
				$data['meta_description'] = the_config('meta_description');

				$popular_cities = $this->City_model->get_popular_city();
				
				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}

		}

		public function states($page='states') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				$data['title'] = 'Locksmiths by '.ucwords($page).' - '.the_config('site_name');

				$data['states'] = $this->State_model->get_states();
				$data['location'] = 'United States';

				$data['title'] = "Find Professional Locksmith Services by State - ".the_config('site_name');
				// META
				$data['meta_title'] = $data['title'];
				$data['meta_keyword'] = "";
				$data['meta_description'] = "LocksmithFindr helps you find locksmith experts in every State.";

				$this->load->view('templates/header', $data);
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');

			}
			
		}

		public function state($page = 'state') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {

				$data['abbrev'] = $this->uri->segment(2, 0);

				$data['state_arr'] = $this->State_model->get_state_from_abbrev($data['abbrev']);

				if ($data['state_arr'] != 0) {

					$data['limit'] = 12;

					$data['city_count'] = count($this->City_model->get_city_from_state(strtolower($data['abbrev'])));

					// $data['cities'] = $this->City_model->get_few_cities_from_state(strtolower($data['abbrev']), $data['limit']);
					$data['cities'] = $this->City_model->get_city_from_state(strtolower($data['abbrev']));

					$data_state = $data['state_arr'][0];

					$rand_int = array_rand(range(1,12), 1);
					$data['banner_img'] = 'build/images/random/'.$rand_int.'.jpg';
					$data['ads_img'] = 'build/images/thumb-ad/'.$rand_int.'.jpg';

					$data['title'] = "Find the Nearest Locksmith in ".$data_state->state." - ".the_config('site_name');
					// META
					$data['meta_title'] = $data['title'];
					$data['meta_keyword'] = "Find a locksmith expert by state, car lockout experts, 247 locksmith services, locksmith experts, commercial locksmiths, residential locksmiths, car locksmiths, automotive locksmith experts, emergency locksmiths, ";
					$data['meta_description'] = "Wherever you are located, we assure that you can find the most reliable and nearest emergency locksmiths - 24 hours available and can provide same day service.";
					
					$this->load->view('templates/header', $data);
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');
				} else {

					header('Location: '.base_url('states'));

				}
			}
		}

		public function city($page = 'city') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {
				
				$slug = $this->uri->segment(2, 0);

				$city_data = $this->City_model->get_city_from_slug($slug);

				if($city_data != 0) {

					$data['city_data'] = $city_data[0];

					$city = $data['city_data']->name;

					$state_abbrev = strtoupper($data['city_data']->state);

					$state = $this->State_model->get_state_from_abbrev($state_abbrev);

					$data['state'] = $state[0];

					$rand_int = array_rand(range(1,12), 1);
					$data['banner_img'] = 'build/images/random/'.$rand_int.'.jpg';
					$data['ads_img'] = 'build/images/thumb-ad/'.$rand_int.'.jpg';

					

					$data['location'] = $city.', '.$data['state']->abbrev;

					$location = 'location='.$data['city_data']->lat.','.$data['city_data']->lng;
					$keyword = 'keyword='.preg_replace('/\s+/', '+', $data['location']);

					$data['google'] = google_places($location, $keyword);
					$gdata = $data['google'];

					if ($gdata['result'] == 'success') {
						if($gdata['data']->status == 'OK') {
							$map_data = array();
							foreach($gdata['data']->results as $gplace) {
								$map_data[] = '["'.addslashes($gplace->name).'", '.$gplace->geometry->location->lat.', '.$gplace->geometry->location->lng.']';
							}
							$data['map_data'] = $map_data;
						}
					}

					$data['title'] = "Find a Local Locksmith in ".$city.", ".$state_abbrev." - ".the_config('site_name');
					// META
					$data['meta_title'] = $data['title'];
					$data['meta_keyword'] = "local locksmiths, emergency local locksmith, locksmith near your city, locksmith near your area, local lockout service, residential locksmiths, commercial locksmiths, car locksmiths, automotive locksmiths, city locksmiths";
					$data['meta_description'] = "We help you find a local locksmith technician nearest your area, may it be a commercial or a residential locksmith and whatever city you are currently located.";
					
					$this->load->view('templates/header', $data);
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');

				} else {

					show_404();

				}
			}			

		}

		public function zip($page = 'zip') {

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			} else {


				$data['zip'] = $this->uri->segment(2, 0);

				if(is_numeric($data['zip']) AND strlen($data['zip']) == 5) {

					$city_data = $this->City_model->get_city_from_zip($data['zip']);

					$data['city_data'] = $city_data[0];

					$data['state'] = $this->State_model->get_state_from_abbrev($data['city_data']->state)[0];

					$rand_int = array_rand(range(1,12), 1);
					$data['banner_img'] = 'build/images/random/'.$rand_int.'.jpg';
					$data['ads_img'] = 'build/images/thumb-ad/'.$rand_int.'.jpg';

					$data['term'] = 'locksmith';
					$data['location'] = $data['city_data']->name.', '.strtoupper($data['city_data']->state).' '.$data['zip'];

					$location = 'location='.$data['city_data']->lat.','.$data['city_data']->lng;
					$keyword = 'keyword='.preg_replace('/\s+/', '+', $data['location']);

					$data['google'] = google_places($location, $keyword);
						$gdata = $data['google'];

					if ($gdata['result'] == 'success') {
						if($gdata['data']->status == 'OK') {
							$map_data = array();
							foreach($gdata['data']->results as $gplace) {
								$map_data[] = '["'.addslashes($gplace->name).'", '.$gplace->geometry->location->lat.', '.$gplace->geometry->location->lng.']';
							}
							$data['map_data'] = $map_data;
						}
					}

					$data['title'] = "Where's the Nearest Locksmith in ".$data['zip'].", ".strtoupper($data['city_data']->state)." - ".the_config('site_name');
					// META
					$data['meta_title'] = $data['title'];
					$data['meta_keyword'] = "Find a locksmith by zipcode, lockout experts near your area, 247 locksmith services, locksmith experts, commercial locksmiths, residential locksmiths, car locksmiths, automotive locksmith experts, emergency locksmiths, ";
					$data['meta_description'] = "If you are looking for the nearest locksmith in your area, then use KnowLocksmith's search engine and find a locksmith by city or zipcode.";
					
					$this->load->view('templates/header', $data);
					$this->load->view('pages/'.$page, $data);
					$this->load->view('templates/footer');

				} else {
					show_404();
				}
			}			

		}

		public function contactProcess() {

			$mdata = $this->input->post();

			$site_key = the_config('gr_site_key');
			$secret_key = the_config('gr_secret_key');
			$site_verify = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$mdata['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
			$response = file_get_contents($site_verify);
			$g_response = json_decode($response);

			if($g_response->success == 1) {

				$emailConfig = [
		            'protocol' => 'smtp', 
		            'smtp_host' => 'ssl://smtp.googlemail.com', 
		            'smtp_port' => 465, 
		            'smtp_user' => the_config('smtp_user'), 
		            'smtp_pass' => the_config('smtp_password'),
		            'mailtype' => 'html', 
		            'charset' => 'iso-8859-1'
		        ];

		        $from = [
		            'email' => $mdata['email'],
		            'name' => strtoupper($mdata['name']).' - '.the_config('site_name').' Contact Us'
		        ];
		       
		        // $to = array($mdata['email']);
		        $to = the_config('admin_email');
		        $subject = $mdata['subject'];
		      	$message = $mdata['message'];
		        $this->load->library('email', $emailConfig);
		        $this->email->set_newline("\r\n");
		        $this->email->from($from['email'], $from['name']);
		        $this->email->to($to);
		        $this->email->subject($subject);
		        $this->email->message($message);
		        if (!$this->email->send()) {
		            $response = json_encode(array('result' => 'error', 'message' => 'Oops! Please try again later.'));
		        } else {
		            $response = json_encode(array('result' => 'success', 'message' => 'Message successfully sent!'));
		        }

			} else {
				$response = json_encode(array('result' => 'error', 'message' => 'Invalid Captcha!'));
			}

	        echo $response;

		}


	}


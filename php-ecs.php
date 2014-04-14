<?
/**
* 
* Marco Cristofanilli (marco.cristofanilli@gmail.com)
*
*
* Licensed under the Apache License, Version 2.0 (the "License"); you may
* not use this file except in compliance with the License. You may obtain
* a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
* WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
* License for the specific language governing permissions and limitations
* under the License.
*/

/* Verify curl install */
if (!function_exists('curl_init')) {
  throw new Exception('PhpECS needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('PHPECS needs the JSON PHP extension.');
}


/* Easy Cloud Server Class*/
class ECS {

	const VERSION = '0.1';

	protected $username;
	protected $password;
	protected $apiurl;
        
	protected $timeout  = 30;                	  
        protected $referrer = 'PhpEcs-VERSION';
        protected $method;                            
        protected $status;
	

	public function __construct ( $username, $password, $apiurl) {
    		$this->username = $username;
    		$this->password = $password;
    		$this->apiurl = $apiurl;
  	}

	/* Get account information */
	function getinfo() {

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->apiurl.$this->username);
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-type:application/json', 'Easycloud-user:'.$this->username , 'Easycloud-token:'.$this->password));
                curl_setopt($ch, CURLOPT_REFERER, $this->referrer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
                $output = curl_exec($ch);
                curl_close($ch);

		return json_decode($output);
	
	}

	/* Create server */
	function create($os, $plan, $location) {
		$ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->apiurl);
                curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-type:application/json', 'Easycloud-user:'.$this->username , 'Easycloud-token:'.$this->password));
	
		curl_setopt($ch, CURLOPT_POST, 1);
		$arr = array('os' => $os, 'plan' => $plan, 'location' => $location);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arr));	
		curl_setopt($ch, CURLOPT_REFERER, $this->referrer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
		$output = curl_exec($ch);
                curl_close($ch);

		return json_decode($output);
	
	}

        /* Delete server */
        function delete($ecs) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->apiurl.$ecs);
                curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-type:application/json', 'Easycloud-user:'.$this->username , 'Easycloud-token:'.$this->password));


		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                
		curl_setopt($ch, CURLOPT_REFERER, $this->referrer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
                $output = curl_exec($ch);
                curl_close($ch);

                return json_decode($output);

        }

        /* Action */
        function action($ecs, $action, $data) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->apiurl.$ecs);
                curl_setopt($ch, CURLOPT_HTTPHEADER, Array('Content-type:application/json', 'Easycloud-user:'.$this->username , 'Easycloud-token:'.$this->password));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                $arr = array('action' => $action, 'data' => $data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arr));

                curl_setopt($ch, CURLOPT_REFERER, $this->referrer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
                $output = curl_exec($ch);
                curl_close($ch);

                return json_decode($output);

        }



}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('connexion');
	}

	public function login()
	{
		$usertaptab = explode("@", $_REQUEST['user_id']);

		$userid = strtolower($usertaptab[0]);
		$password = $_REQUEST['password'];

		$result = $this->ldapConnect_($userid, $password);

		if ($result['result'] == 'connect') {

			$ADUser = $result['content'][0];
			// $email = strtolower($ADUser['mail']['0']);
			// $_SESSION['userid'] = $userid;
			$this->session->set_userdata('matricule', $ADUser['description'][0]);
			$this->session->set_userdata('mail', $ADUser['mail'][0]);
			$this->session->set_userdata('memberof', $ADUser['memberof'][0]);
			$this->session->set_userdata('sn', $ADUser['sn'][0]);
			$this->session->set_userdata('givenname', $ADUser['givenname'][0]);
			$this->session->set_userdata('password', $password);

			$this->getUser($ADUser['mail'][0]);

			// var_dump($ADUser);
			// $this->load->view('connexion');

			// $data = array('myRequests' => $this->getMyRequest());
			// $this->Template_model->dashbord_template('dashboard', $data);
			exit();
		} else {
			$data = array('error' => $result['content']);
			$this->load->view('connexion', $data);
		}


		// $this->session->set_userdata('matricule', "M52800");
		// $this->session->set_userdata('mail', "sylvestre.tam@camlight.cm");
		// $this->session->set_userdata('memberof', "");
		// $this->session->set_userdata('sn', "TAM");
		// $this->session->set_userdata('givenname', "Sylvestre");
		// $this->session->set_userdata('password', "Lionelmessi10");

		// header("Location: " . base_url() . "index.php/dashboard");
	}

	private function ldapConnect_($userid, $password)
	{
		try {
			// Connexion au serveur
			$server = "ldap://10.250.90.8"; //"camlight.cm"; //"10.250.90.207";
			$port = '389';
			$connexion_serveur = ldap_connect($server, $port);

			// Information de connexion
			$UserId = $userid;
			$pwd = $password;

			if ($connexion_serveur) {
				ldap_set_option($connexion_serveur, LDAP_OPT_PROTOCOL_VERSION, 3);
				ldap_set_option($connexion_serveur, LDAP_OPT_REFERRALS, 0);

				$userDn = trim($UserId) . "@camlight.cm";
				$userPw = $pwd;

				$result = @ldap_bind($connexion_serveur, $userDn, $userPw);

				// Connexion identifiée au serveur			               
				if (!$result) {
					ldap_close($connexion_serveur);
					$output = ['result' => 'connectError', 'content' => 'Nom utilisateur ou mot de passe incorrect'];
				} else {
					//Récupération des informations personnel de l'utilisateur
					//Definition du compte AD à chercher
					$samaccount = $UserId;
					$dn = "OU=Guests,OU=Cameroon,Dc=camlight,DC=cm";  //nom du domaine de recherche
					$filter = "(&(objectCategory=person)(objectclass=user)(sAMAccountName=$samaccount))";
					$attr = array("mail", "givenname", "sn", "description", "memberof"); //attributs à récuperer

					$results = ldap_search($connexion_serveur, $dn, $filter, $attr);
					$display = ldap_get_entries($connexion_serveur, $results);

					if ($display["count"] == 0) {
						$dn = "OU=Eneo People,OU=People,OU=Cameroon,Dc=camlight,DC=cm";  //nom du domaine de recherche
						$results = ldap_search($connexion_serveur, $dn, $filter, $attr);

						$display = ldap_get_entries($connexion_serveur, $results);

						if ($display["count"] == 0) {
							$output = ['result' => 'connectError', 'content' => 'Compte invalide'];
						} else {
							$output = ['result' => 'connect', 'content' => $display];
						}
					} else {
						$output = ['result' => 'connect', 'content' => $display];
					}
				}
			} else {
				$output = ['result' => 'error', 'content' => 'Erreur de connexion au serveur'];
			}

			return $output;
		} catch (Exception $e) {
		}
	}

	private function getUser($email)
	{
		$user = $this->db->get_where('user', array('email_user' => $email))->row();

		if (empty($user)) {
			$data = array('error' => "Vous ne pouvez pas acceder à cette application");
			$this->load->view('connexion', $data);
		} else {
			$this->session->set_userdata('role', $user->id_role_role);
			header("Location: " . base_url() . "index.php/dashboard");
		}
	}
}
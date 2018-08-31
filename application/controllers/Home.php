<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';
require_once 'vendor/microsoft/microsoft-graph/src/Graph.php';
use Microsoft\Graph\Connect\Constants;
use Microsoft\Graph\Graph;

class Home extends CI_Controller {

	public function index()
	{
		if(!empty($this->session->userdata('Usuario'))){    
           
        }else{
            $this->login();
        } 

	}

	public function login() {  
        require_once 'vendor/autoload.php';
        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => Constants::CLIENT_ID,
            'clientSecret'            => Constants::CLIENT_SECRET,
            'redirectUri'             => Constants::REDIRECT_URI,
            'urlAuthorize'            => Constants::AUTHORITY_URL . Constants::AUTHORIZE_ENDPOINT,
            'urlAccessToken'          => Constants::AUTHORITY_URL . Constants::TOKEN_ENDPOINT,
            'urlResourceOwnerDetails' => '',
            'scopes'                  => Constants::SCOPES
        ]);
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['code']) && !isset($_GET['error'])) {
            $authorizationUrl = $provider->getAuthorizationUrl();
            // The OAuth library automaticaly generates a state value that we can
            // validate later. We just save it for now.
            $_SESSION['state'] = $provider->getState();
            
            header('Location: ' . $authorizationUrl);
            exit();
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])) {
            // Answer from the authentication service contains an error.
            printf('Something went wrong while authenticating: [%s] %s', $_GET['error'], $_GET['error_description']);
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])) {
            
            // Validate the OAuth state parameter
            if (empty($_GET['state']) || ($_GET['state'] != $_SESSION['state'])) {
             unset($_SESSION['state']);
             echo 'State value does not match the one initially sent';
             exit();
             }
            
            // With the authorization code, we can retrieve access tokens and other data.
            try {
                // Get an access token using the authorization code grant
                $accessToken = $provider->getAccessToken('authorization_code', ['code'=> $_GET['code']]);
			//$_SESSION['access_token']=$accessToken->getToken();
			$this->session->set_userdata('access_token',$accessToken->getToken());
                //$_SESSION['access_token'] = $accessToken->getToken();                
                // The id token is a JWT token that contains information about the user
                // It's a base64 coded string that has a header, payload and signature
                $idToken = $accessToken->getValues()['id_token'];
                $decodedAccessTokenPayload = base64_decode(
                    explode('.', $idToken)[1]
                    );
                $jsonAccessTokenPayload = json_decode($decodedAccessTokenPayload, true);
                
                $this->session->set_userdata('id',$jsonAccessTokenPayload['preferred_username']);
                
                $id = $this->session->userdata('id');
                /*$usuario = $this->Usuario_model->validarUsuario($id);                
                $variables = array(
                    'IDUsuario' => $usuario->IDUsuario,
                    'Usuario' => $usuario->Usuario,
                    'Nombres' => $usuario->Nombres,
                    'NPersonal' => $usuario->NPersonal,
                    'Area' => $usuario->IDClave,
                    'Color' => $usuario->Color,
                    'Rango' => $usuario->Rango,
                    'Tipo' => $usuario->Tipo,
                    'Estatus' => $usuario->Estatus,
                    'AreaPrimaria' => $usuario->IDClave 
                );
                $this->session->set_userdata($variables);*/
               // $this->calendar();   
                /*$this->Comun_model->Bitacora('0',$usuario->IDUsuario,1);*/
                
                header('Location: '.base_url());
                exit();
            } catch (League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
                printf('Something went wrong, couldn\'t get tokens: %s', $e->getMessage());
            }
        }
    }
	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
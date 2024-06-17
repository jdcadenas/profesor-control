<?php


namespace App\Services\Moodle;

use Illuminate\Support\Facades\Http;
class UserService extends BaseRestService {

    /**
     * Returns api data -  All users
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     */
    public function getAll() {
        $this->params['wsfunction'] = 'core_user_get_users';
        $this->params['criteria[0][key]'] = 'email';
        $this->params['criteria[0][value]'] = '%%';
        return $this->service->get($this->url, $this->params);
    }

    /**
     * Returns api data - enrolled users with grades
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     */
    public function getEnrolled() {
        $this->params['wsfunction'] = 'local_webservice_get_enrolled_users';
        return $this->service->get($this->url, $this->params);
    }

    public function isUserTeacher($userId)
    {
        // Set Moodle API parameters
        $params = [
            'userid' => $userId,

        ];
        $userRoles = $this->service->get($this->url, $params);

        // Check if user has teacher role
        foreach ($userRoles as $userRole) {
            if ($userRole['roleid'] === '4') { // Check for teacher role ID (4)
                return true;
            }
        }

        return false;
    }

    public function isUserRegistered($email)
    {
        $this->params['wsfunction'] = 'core_user_get_users';
        $this->params['criteria[0][key]'] = 'email';
        $this->params['criteria[0][value]'] = $email;
        // Call Moodle API function to get user data
        $userData = $this->service->get($this->url, $this->params);
        // Extract relevant user data
        if (isset($userData["data"]["users"])) {
            return $userData["data"]["users"];
        }
        return false;
    }
    
    public function isUserValidate($username,$password)
    {
        
        $url=env('MOODLE_REST_API_URL');
        
        $tokenfunction = $url."?service=moodle_mobile_app&username=". $username."&password=". $password;
     
//https://Sistema/login/token.php?service=moodle_mobile_app&username=usuariotest&password=password
        $response = Http::get($tokenfunction);

        dd($response);

       
        
        if (isset($userData["data"]["users"])) {
            return $userData["data"]["users"];
        }
        return false;
    }
    
}
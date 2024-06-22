<?php


namespace App\Services\Moodle;

use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;

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
        return $this->service->get($this->url, $this->params);
        
    }
    
    public function isUserValidate($username,$password)
    {
        
        $url = env('MOODLE_USER_URL');

        $tokenfunction = "?service=moodle_mobile_app&username=". $username."&password=". $password;
        $response = Http::get($url.$tokenfunction)->json();;
       
        if (isset($response["token"])) {
          
            return $response["token"];
        }
        return false;
    }
    
}
<?php


namespace App\Services\Moodle;


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
        if (isset($userData["data"])) {
            return [
                'id' => $userData["data"]['users'][0]["id"],
                'username' => $userData["data"]['users'][0]['username'],
                'firstname' => $userData['data']['users'][0]['firstname'],
                'lastname' => $userData["data"]['users'][0]['lastname'],               
                'fullname' => $userData["data"]['users'][0]['fullname'],
                'email' => $userData["data"]['users'][0]['email'],
                'department' => $userData["data"]['users'][0]['department'],
                'suspended' => $userData["data"]['users'][0]['suspended'],
                'confirmed' => $userData["data"]['users'][0]['confirmed'],
                'profileimageurlsmall' => $userData["data"]['users'][0]['profileimageurlsmall'],
                'profileimageurl' => $userData["data"]['users'][0]['profileimageurl'],
            ];
        }

        return null;
    }
    
}
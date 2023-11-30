<?php

class UserController extends BaseController
{
    
    /**
     
     * "/user/list" Endpoint - Get list of users
     
     */
    
    public function listAction()
    {   
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        
        $arrQueryStringParams = $this->getQueryStringParams();
        
        if (strtoupper($requestMethod) == 'GET') {

            try {

                $userModel = new UserModel();
                
                $intLimit = 10;

                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {

                    $intLimit = $arrQueryStringParams['limit'];
                }

                $arrUsers = $userModel->getUsers($intLimit);
                
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';

                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {

            $strErrorDesc = 'Method not supported';
            
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        // send output
        
        session_start();
        if (!$strErrorDesc) {
            
            $this->sendOutput(

                $responseData,

                array('Content-Type: application/json', 'HTTP/1.1 200 OK')

            );
        } else {

            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),

                array('Content-Type: application/json', $strErrorHeader)

            );
        }
    }
    public function registerAction(){
        error_log('registerAction');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $username = $_POST["Username"];
                $password = $_POST["Password"];
                $user = $userModel->getUserByUsername($username);
                if ($user) {
                    error_log('User already exists');
                    
                } else {
                    $userModel->registerUser($username, $password);
                    error_log($username);
                    // Successful registration, redirect to a login page
                header("Location: ../index.php/register?message=1");
                exit;
                }
            } catch (Error $e) {
                
                echo $e.'Something went wrong! Please contact support.';
                header("Location: ../index.php/register?message=0");
                exit;

            }
        } // send outp
        require_once("./views/login.php");
    }
    public function loginAction(){
        error_log('loginAction');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
      
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $username = $_POST["Username"];
                $password = $_POST["Password"];
                $user = $userModel->getUserByUsername($username);
                if ($user) {
                    error_log('User exists');
                    if(password_verify($password, $user["password"])){
                        session_start();
                        error_log('User logged in');
                        $_SESSION['user'] = $user['user_id'];
                        $GLOBALS['a'] = $user['user_id'];
                        header("Location: /index.php/user/home");
                        exit;
                    }else{
                        error_log('Wrong password');
                        header("Location: /index.php/user/login?message=0");
                        exit;
                    }
                } else {
                    error_log('User does not exist');
                    header("Location: /index.php/user/login?message=0");
                    exit;
                }
            } catch (Error $e) {
                
                echo $e.'Something went wrong! Please contact support.';
                header("Location: /index.php/user/login?message=0");
                exit;

            }
        } // send outp
        
        require_once("./views/login.php");
    }
    function logoutAction(){
        session_destroy();
        header("Location: /index.php/user/login");
        exit;
    }
    function homeAction(){
        if(isset($_SESSION['user'])!==null&&isset($_SESSION['user'])!==""){
            require_once("./views/home.php");
        }else{
            header("Location: /index.php/user/login");
            exit;
        }
    }
    function profileAction(){
        session_start();
        if(isset($_SESSION['user'])!==null&&isset($_SESSION['user'])!==""){
            $userModel = new UserModel();
            $id = $_SESSION['user'];
            error_log($id);
            $user = $userModel->getApiUserByUsername($id);
            require_once("./views/profile.php");
        }else{
            header("Location: /index.php/user/login");
            exit;
        }

    }
    
    
}

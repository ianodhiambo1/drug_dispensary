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
}

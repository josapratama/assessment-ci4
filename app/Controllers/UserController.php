<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function login()
    {
        $userModel = new UserModel();

        $validationRules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
            }

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if (!is_array($password)) {
                var_dump($username, $password);
            }

            $user = $userModel->where('username', $username)->first();

            if ($user !== null) {
                $userPassword = $user['password'];

                if (!empty($userPassword) && password_verify($password, $userPassword)) {
                    $session = session();
                    $session->set('logged_in', true);
                    $session->set('user_id', $user['user_id']);
                    return redirect()->to('/dashboard');
                }
            }
            return redirect()->to('/login')->withInput()->with('error', 'Invalid username or password.');
        }

        return view('auth/login');
    }


    public function pageRegister()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
    }

    public function register()
    {
        $userModel = new UserModel();

        $validationRules = [
            'full_name' => 'required',
            'username' => 'required|is_unique[tb_users.username]',
            'email_address' => 'required|valid_email|is_unique[tb_users.email_address]',
            'password' => 'required|min_length[8]',
            'retype_password' => 'required|matches[password]'
        ];

        if ($this->request->getMethod() == 'POST') {
            if (!$this->validate($validationRules)) {
                return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
            }

            $password = $this->request->getPost('password');

            if (is_string($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $data = [
                    'full_name' => $this->request->getPost('full_name'),
                    'username' => $this->request->getPost('username'),
                    'email_address' => $this->request->getPost('email_address'),
                    'password' => $hashedPassword,
                    'retype_password' => $hashedPassword
                ];
                $userModel->save($data);
                session()->setFlashdata('message', 'Data User berhasil disimpan.');

                return redirect()->to('/login');
            } else {
                return redirect()->to('/register')->withInput()->with('error', 'Invalid password.');
            }
        }

        return view('auth/register');
    }

    public function pageForgot()
    {
        return view('login/forgot');
    }

    public function logout()
    {
        $session = session();
        $session->remove('logged_in');
        $session->remove('user_id');

        return redirect()->to('/login');
    }
}

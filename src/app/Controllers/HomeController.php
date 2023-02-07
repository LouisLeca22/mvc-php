<?php 

declare(strict_types=1);

namespace App\Controllers;

use App\View;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Signup;

class HomeController {
    public function index(): View {
        

        $email = 'gabriela@mail.com';
        $name = 'Gabriela Marquez';
        $amount = 26;

        
        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
            'email' => $email,
            'name' => $name
            ],
            [
            'amount' => $amount
            ]
        );

    
        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function download(){
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.pdf"');
        readfile(STORAGE_PATH.'/plan.pdf');
    }

    public function upload(){

        $filepath =  STORAGE_PATH.'/'.$_FILES['receipt']['name'];
       move_uploaded_file(
        $_FILES["receipt"]['tmp_name'], 
        $filepath
        );

        header('Location: /');
        exit;
    }
}
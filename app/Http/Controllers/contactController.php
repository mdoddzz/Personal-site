<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    

    public function contact() 
    {
        return view('contact');
    }

    public function sumbitContact() 
    {
        // Sumbit contact
        $headers = "From: ".$_POST["contactEmail"];
        
        ini_set("SMTP","mail.mdodddev.com");

        mail("contact@michaeldodd.co.uk", "New Website Contact Request", "Email From: ".$_POST["contactName"]." <".$_POST["contactEmail"]."> \r\n\r\n ".$_POST["contactMessage"]);

        return view('contact');

        
    }

}

?>
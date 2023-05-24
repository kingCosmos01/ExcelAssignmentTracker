<?php


    if(isset($_POST['submit_document'])) {

        $excelDocument = $_FILES['excel'];
        $excelDocumentName = $excelDocument['name'];

        $documentExtension = explode('.', $excelDocumentName);
        $documentExtension = end($documentExtension);

       if($documentExtension !== 'xlsx') 
       {
            require 'Redirect.php';
            $redirectOBJ = new Redirect;
            
            $redirectOBJ->redirect('http://localhost/extracker/admin/', ['err', 'Send Only Excel Document!']);
            exit();
       } 
       else 
       {

       }

        echo "<div style='position:absolute;display:block;width:200px;height:200px;top:50%;left:50%;transform:translate(-50%, -50%); background:red;color:white;text-align:center;z-index:999;'>"
         
            . $documentExtension .
        
         "</div>";

    }
<?php
if(isset($_REQUEST["file"])){
    // Get parameter and decode URL-encoded string
    $file = urldecode($_REQUEST["file"]); 
   
    // Test whether the file name contains illegal characters
        
        $filepath = "Admin/Stellar-master/Uploaded_Projects/" . $file;
        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'
                                        .basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
  
            // Flush system output buffer
            flush(); 
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
            die();
        }
}
else{
    echo "File name not received!";
}
?>
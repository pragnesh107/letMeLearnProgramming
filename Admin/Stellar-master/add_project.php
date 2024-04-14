

<?php
   echo "File Name :". $file['name']."<br>";
   echo "File type :". $file['type']."<br>";
   echo "File size :". $file['size']."<br>";


   if(file_exists("project_files/".$file['name']))
   {
       echo $file["name"]. "Already exist";
   }
   else if($file["type"] == "zip/zipx/"){
   
       move_uploaded_file($file['tmp_name'],"project_files/".$file['name']);
   }
   else{
       echo "File format is not valid , it must be zip or zipx ";
   }
   die("hello");
   ?>
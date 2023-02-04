<?php
include('config.php');









if(isset($_POST['submit'])){

    
    
   

    $user_id = $_SESSION['id'];

    $partylist = $_POST['droppartylist'];
    $position = $_POST['droppos'];
    $can_name = $_POST['can_name'];
    $can_mname = $_POST['can_mname'];
    $can_lname = $_POST['can_lname'];
    $can_course = $_POST['can_course'];
    $can_photo = $_FILES['can_photo'];
    

    if($_FILES['can_photo']['error'] === 4){
        echo "<script> alert('Image does not exist'); </script>";
    }else{
        $filename = $_FILES['can_photo']['name'];
        $size = $_FILES['can_photo']['size'];
        $tmp_name = $_FILES['can_photo']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension,$validImageExtension)){
                echo "<script> alert('Invalid Image Extension'); </script>";
            }
            else if($size > 512000){
                echo "<script> alert('Size too large'); </script>";
            }else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmp_name, 'webimg/' . $newImageName );
                // $targer_dir="webimg/";
                // $targer_file=$targer_dir.$filename;
                // $filetype=strtolower(strtolower(pathinfo($targer_file,PATHINFO_EXTENSION)));

                // $curr_year =date('Y',time());
                $query = "SELECT * FROM vot_year WHERE status = 1";
                $exe = $conn->query($query);
                while($row = mysqli_fetch_array($exe)){
                    $year_id = $row['id'];
                }
                

                $query = "INSERT INTO vot_candidates (partylist_id, position_id, name, m_initial, lname, course_id, photo , year_id) VALUES ('$partylist', '$position', '$can_name', '$can_mname', '$can_lname', '$can_course', '$newImageName', '$year_id')";
                $query2 = "UPDATE vot_users SET is_filing = 1 WHERE id = '$user_id'";
                if(mysqli_query($conn,$query) && $conn->query($query2)){
                     echo '<script> alert("Successful");</script>';
                //var_dump($query);
                echo "<script> setTimeout(() => {
                         window.location.href = 'voters.php'
                        }); </script>";
                }else{
                    die($conn->error);
                }
                
                
               
            }
    }
     
    







}

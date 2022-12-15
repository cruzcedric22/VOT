<?php
session_start();
  include('config.php');

  if(isset($_POST)){
    


    $username = $_POST['username'];
    $password = $_POST['pass'];
    $msg = array();
    
    
    //$sql = "select * from users where username = '$username' limit 1 ";

    $cat_user = "SELECT vot_users.id, vot_users.username,vot_users.password, vot_user_profile.fname, vot_user_profile.m_initial, vot_user_profile.lname, vot_user_profile.student_no, vot_course.course_name, vot_users.is_voted, vot_cat_user.cat_name from vot_users, vot_cat_user, vot_user_profile, vot_course WHERE (vot_users.category_id = vot_cat_user.category_id) AND username = '$username' AND (vot_user_profile.student_no = vot_users.student_no) AND vot_course.course_id = vot_user_profile.course_id";
    $result1 = $conn->query($cat_user);
    
    if($result1 -> num_rows == 0){
      $msg['title'] = "ERROR";
      $msg['message'] =  "USER DOESNT EXIST";
      $msg['icon'] =  "warning";
      $msg['login'] = 4;
       
    }  

    $session_elect = "SELECT * FROM vot_session";
    $exe2 = $conn ->query($session_elect);
        while($row = mysqli_fetch_assoc($exe2)){
            $_SESSION['is_election'] = $row['is_election'];
            $_SESSION['is_filing'] = $row['is_filing'];
        }

      
    
    
    
    
        while ($row = $result1->fetch_assoc()) {
            //echo $row["password"];
            $_SESSION['id'] = $row['id'];
            $_SESSION['fname'] = $row ['fname'];
            $_SESSION['m_initial'] = $row ['m_initial'];
            $_SESSION['lname'] = $row ['lname'];
            $_SESSION['course_name'] = $row ['course_name'];

            $_SESSION['isvoted'] = $row['is_voted'];
            $_SESSION['student_no'] = $row['student_no'];
            $_SESSION['cat_name'] = $row['cat_name'];
         
              if(sha1($password) === $row["password"]){   
                $row['cat_name'];
              if($row['cat_name'] == 'Voter'){
                 
                $_SESSION['username'] = $username;
           
              $msg['title'] = "Welcome";
              $msg['message'] =  "Successfully Login";
              $msg['icon'] =  "success";
              $msg['login'] = 1;
            }else if($row['cat_name'] == 'Staff'){
              $_SESSION['username'] = $username;
              $msg['title'] = "Welcome";
              $msg['message'] =  "Successfully Login";
              $msg['icon'] =  "success";
              $msg['login'] = 2;
            }else if($row['cat_name'] == 'Admin'){
          
              $_SESSION['username'] = $username;
             
              $msg['title'] = "Welcome";
              $msg['message'] =  "Successfully Login";
              $msg['icon'] =  "success";
              $msg['login'] = 3;
              
            }
            
          }
          else{
            $msg['title'] = "ERROR";
            $msg['message'] =  "Wrong username or password";
            $msg['icon'] =  "warning";
            $msg['login'] = 4;
             
          }

            



           
        }
    
    $conn->close();
    echo json_encode($msg);
      }
  
// include('config.php');
// $username = $_POST['username'];
// $password = $_POST['pass'];

// $sql = "select * from users where username = '$username' limit 1 ";
// // if ($result  = $conn->query($sql)) {
//     echo $sql;
//     $result  = $conn->query($sql);

//     while ($row = $result->fetch_assoc()) {
//         echo $row["password"];
//         if(sha1($password) === $row["password"])
//             echo "Successfully Logged in";
//         else{
//             echo "User not yet registered";
//         }
//     }
    // $finfo = mysqli_fetch_assoc($result);
    // echo "Welcome";
    // $num_rows = mysqli_num_rows($result);
    // echo $num_rows;
//   } 
//   else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
  


<?php 
session_start(); 
include('voters.php');
// for trial only delete later 
include('config.php');

$user_log = $_SESSION['username']; 
echo $_SESSION['id'];


$session_elect = "SELECT * FROM vot_session";
    $exe2 = $conn ->query($session_elect);
        while($row = mysqli_fetch_assoc($exe2)){
            $_SESSION['is_election'] = $row['is_election'];
        }
$elec_start = $_SESSION['is_election'];
$voted = $_SESSION['isvoted'];
$cat_name = $_SESSION['cat_name'];



if($voted == 1 || $elec_start == 0){
    echo "<script> setTimeout(() => {
        window.location.href = 'voters.php'
    },1); </script>";
}elseif($cat_name != 'Voter'){
    echo "<script> setTimeout(() => {
        window.location.href = 'admin.php'
    },1000); </script>";
}


$selectpos = "SELECT * FROM vot_position";
$result = mysqli_query($conn, $selectpos);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .btn-outline-primary {
            padding: 10px 300px;
            font-size: 20px;
            border-radius: 10px;
        }
        .absolute-Center {

            display: flex; 

            align-items: center; 

            justify-content: center; 

            text-align: center; 

        }  
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTING</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>



          
         
       
    


<div class="container-fluid px-4">
                <h1>Voting</h1>
                <?php while($row = mysqli_fetch_assoc($result)){ 
                     $pos_id = $row['position_id'];?>
                <div class="p-3 bg-white shadow-sm d-flex rounded absolute-Center">
                    <div class="">
                    <!-- <form action="process_voting.php" method="post" id="voting_form" name = "vot_form"> -->
                        <div class="row mx-2">
                        <h3><?php echo $row['pos_name'] ?></h3>
                            <?php $query = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.photo, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list,vot_course, vot_year WHERE (vot_candidates.position_id = '$pos_id' AND vot_position.position_id = '$pos_id') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND (vot_course.course_id = vot_candidates.course_id AND vot_year.id = vot_candidates.year_id) AND (vot_year.status = 1 AND vot_candidates.status =1) ORDER BY vot_candidates.position_id ASC;";
                             $selectpopulate = mysqli_query($conn, $query); 
                             while($row2 = mysqli_fetch_assoc($selectpopulate)){ ?> 
                            <div class="col">
                            <img src="<?php echo "webimg/".$row2['photo'] ?>" class="img-table-responsive img-thumbnail rounded" width="100" alt="PHOTO">
                            </div>
                
                            <div class="col">
                            <p class="p-0 m-0" style="color: #F29E10; font-weight: bolder; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row2['name'].' '.$row2['m_initial'].' '.$row2['lname'] ?></p>
                            <p class="p-0 m-0" style="font-weight:lighter; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row2['course_name'] ?></p>
                            <p class="p-0 m-0" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row2['party_name'] ?></p>
                            </div>
                            <div class="col mx-3">
                                <input class="mt-3 radioButtons" type="radio" name="<?php echo $row['pos_name']; ?>" id="<?php echo $row['pos_name'] ?>" value="<?php echo $row2['id'] ?>">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
              
                <div class="text-center">
                        <!-- <input class="btn btn-sm" style="font-weight: bolder;" name="submit" type="submit"> -->
                        <!-- <input class="btn btn-sm" style="font-weight: bolder;" name="submit" type="button" onclick="summary()"> -->
                        <button class="btn btn-outline-primary btn-lg btn-block mt-2 mb-2" style="width: max-content;" onclick="summary()">SUBMIT</button>
                </div>  
                <!-- </form> -->

                                 <!-- modal for display camdidates modal -->
                             <div class="modal fade" id="disp_can_list"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Summary of Votes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="show_summary_list">
                                        <form id="cast_votes">
                                        </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="toVote" class="btn btn-success" onclick="user_votes_cast()">Submit</button>
                                        <!-- <button type="button" class="btn btn-info" onclick="printListVotes()">Print</button> -->
                                        <input type="hidden" id="userid" value="<?php echo $_SESSION['id']; ?>">
                                    </div>
                                    </div>
                                </div>
                                </div>
        
    </div>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // function summary(){
        //     let a = document.getElementsByClassName("radioButtons");
            
        //     let allChecked = [] 
            
        //     Array.from(a).forEach(e=>{
        //         if(e.checked){
        //             allChecked.push({pos_name:e.id,value:e.value})
        //         }
        //     })
        //     console.log(allChecked);
        // }

        // $(document).ready(function() {
        // // Code executed when the document is ready
        // // ...

        // // Add an event listener or trigger the function
        // $('#disp_can_list').on('shown.bs.modal', function() {
        //     user_votes_cast();
        // });
        // });

        $( document ).ready(function() {
            checkIfDbQrChange();
          $('#toVote').prop('disabled', true);
          $('#toVote').css('pointer-events', 'none');
          $('#toVote').css('opacity', '0.2');
          
         

         
        });


        function summary() {
            let allChecked = [];
            
            $(".radioButtons:checked").each(function() {
                allChecked.push({
                pos_name: this.id,
                value: this.value
                });
            });
            
            console.log(allChecked);

            $.ajax({
                    url: "disp_can.php",  // Replace with the URL of your server-side script
                    method: "POST",
                    data: { allChecked: JSON.stringify(allChecked) },
                        success: function(response) {
                        // console.log("Data sent successfully");
                        // // Handle the response from the server if needed
                        // var data = JSON.parse(response);
                        $('#disp_can_list').modal('show');
                        $("#show_summary_list").html(response);
                        
                        },
                        error: function(xhr, status, error) {
                        console.error("Error sending data:", error);
                        // Handle the error if needed
                    }
                });
            };

            function user_votes_cast(){
                var formData = $('#cast_votes').serializeArray();
                console.log(formData);

                $.ajax({
                    url: "process_voting.php", // Replace with the URL of your server-side script to process the votes
                    method: "POST",
                    data: formData,
                    success: function(response) {
                    console.log("Votes submitted successfully");
                    // Handle the response from the server if needed
                     var data = JSON.parse(response);
                    swal.fire(data.title,data.message,data.icon);
                    var printContents = $("#show_summary_list").html();
                    $("body").html(printContents);
                    window.print();
                    setTimeout(() => {
                        window.location.href = "candidates.php"
                    },1);
                    },
                    error: function(xhr, status, error) {
                    console.error("Error submitting votes:", error);
                    // Handle the error if needed
                    }
                });

             

            };


            
        function checkIfDbQrChange(){
            var userid = <?php echo $_SESSION['id']; ?>;
          console.log(userid);
        $.ajax({
            url:"qr_api.php",
            method:"POST",
            data:{userid:userid},
            success:function(data)
            {
                var data = JSON.parse(data);
                console.log(data);
                if(data.status == "valid"){
                $('#toVote').prop('disabled', false);
                $('#toVote').css('pointer-events', 'default');
                $('#toVote').css('opacity', '1');
                }
            },complete: function(){
                setTimeout(checkIfDbQrChange,2000);

            }
        });
    };






            function printListVotes(){
                var printContents = $("#show_summary_list").html();
                $("body").html(printContents);
                window.print();
                window.location.reload();
            };



    </script>
                
    
        



    
    
</body>
</html>


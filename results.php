<?php //session_start(); 
include("admin.php");
include('config.php'); 
$session_elect = "SELECT * FROM vot_session";
$exe2 = $conn ->query($session_elect);
    while($row = mysqli_fetch_assoc($exe2)){
        $_SESSION['is_election'] = $row['is_election'];
    }
    $condition_result = $_SESSION['is_election'];
    $year_now  = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Results</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        @media print{
            button{
                display: none;
            }
            #btn_print{
                display: none;
            }
           #menu-toggle{
            display: none;
           }
             #year_can{
            display: none;
           }
           #filter_result{
            display: none;
           }
          @page {
            size: 8.5in 11in;
            }
        }
    </style>
</head>
<body>
    <h1 class="m-4">RESULTS</h1>
    <div class="container-fluid px-4">
              <div class="row">
            <div class="col">
            <form method="POST">
                    <select class="form-select w-25 mb-2" id="year_can" name="year_can">
                         <?php
                           $query = "SELECT id, year FROM vot_year";
                           $exe6 = $conn -> query($query);
                           while($row6 = mysqli_fetch_assoc($exe6)){
                          ?>
                            <option value="<?php echo $row6['id'] ?>"><?php echo $row6['year'] ?></option>  
                         <?php } ?>
                     </select>
                     <button type="submit" id="filter_result" class="btn btn-primary mb-2" name="filter_result">Filter</button>
            </form>
            </div>
        </div>
        <div class="row">
         
        <?php
        if($condition_result == 1){
         $selectpos = "SELECT * FROM vot_position";
         $result = $conn -> query($selectpos);
         while($row1 = mysqli_fetch_assoc($result)){
            $pos_id = $row1['position_id'];
         ?>
        
            <div class="col-6" id="bg">
              <div class="p-3 mb-3 bg-white shadow-sm  justify-content-around align-items-center rounded">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-weight: bold;" class="p-0 m-0"><?php echo $row1['pos_name'] ?></p>
                        <div id="<?php echo 'chart'.$row1['position_id']?>"></div>
                </div>
            </div>
            
       
        <?php $populatechart = "SELECT vot_candidates.id, vot_candidates.name, vot_course.course_name, vot_candidates.cand_votes, vot_candidates.photo, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list, vot_course WHERE (vot_candidates.position_id = '$pos_id' AND vot_position.position_id = '$pos_id') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND vot_course.course_id = vot_candidates.course_id ORDER BY vot_candidates.position_id ASC";
                 $selectpopulate = mysqli_query($conn, $populatechart);
                //  $row = mysqli_fetch_assoc($selectpopulate);
                //  print_r($row);
                $json_array = [];
                
                while($row = mysqli_fetch_assoc($selectpopulate)){
                    // $names[] = $row['name'];
                    // $votescount[] = (int) ($row['cand_votes']);
                    $json_array[] = array('x'=>$row['name'],'y'=>(int)$row['cand_votes']);
                }
                // print_r($votescount);
                
                
            ?>
        <script>
                var arrayNames = (<?php echo json_encode($json_array) ?>)
                
                console.log(arrayNames)
                // console.log(arrayVotes)
                 var options = {
                            chart: {
                                type: 'bar'
                            },
                            series: [{
                                data:arrayNames
                            }]
                            }
                // var id = String(<?php echo ("#chart".$row1['position_id'])?>)
                var id = "<?php echo "#chart".$row1['position_id']?>";
                console.log(id);
                var chart = new ApexCharts(document.querySelector(id), options);

                chart.render()
        </script>
        <?php }
         ?>
        <?php } ?>
         
        <?php if($condition_result == 0){ ?>
        <div>
         <button type="button" class="btn btn-success mb-2" id="btn_print" onclick="printDiv()">PRINT</button>
             <?php
         $selectpos1 = "SELECT * FROM vot_position";
         $result2 = $conn -> query($selectpos1);
         while($row2 = mysqli_fetch_assoc($result2)){
            $pos_id1 = $row2['position_id'];
            $count = 0;
         ?>
         <div class="col-6 bg-white border-dark rounded w-100" id="print_result">
            <div class="row mx-2 mb-3">
            <h4><?php echo $row2['pos_name'] ?></h4>
             <?php if(isset($_POST['filter_result'])){
                  $year=$_POST['year_can'];
                    $select_Can = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.cand_votes, vot_candidates.photo, vot_candidates.cand_votes, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list, vot_course, vot_year WHERE (vot_candidates.position_id = '$pos_id1' AND vot_position.position_id = '$pos_id1') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND vot_course.course_id = vot_candidates.course_id AND vot_candidates.year_id = '$year' AND vot_year.id = '$year' ORDER BY vot_candidates.cand_votes DESC"; 
                    $result3 = $conn -> query($select_Can);
            }
            else{
                $select_Can = "SELECT vot_candidates.id, vot_candidates.name, vot_candidates.m_initial, vot_candidates.lname, vot_course.course_name, vot_candidates.cand_votes, vot_candidates.photo, vot_candidates.cand_votes, vot_position.pos_name, vot_party_list.party_name, vot_party_list.partylist_id FROM vot_candidates, vot_position, vot_party_list, vot_course, vot_year WHERE (vot_candidates.position_id = '$pos_id1' AND vot_position.position_id = '$pos_id1') AND (vot_candidates.partylist_id = vot_party_list.partylist_id) AND vot_course.course_id = vot_candidates.course_id AND vot_year.id = vot_candidates.year_id AND vot_year.status = 1 ORDER BY vot_candidates.cand_votes DESC"; 
                  $result3 = $conn -> query($select_Can);
            }
                  while($row3 = mysqli_fetch_array($result3)){?>
                  <?php  ?>
                <div class="col">
                <div class="row">
                    <?php if($count == 0){  ?>
                    <div class="col">
                    <img src="<?php echo "webimg/".$row3['photo'] ?>" class="img-table-responsive img-thumbnail" width="100" alt="PHOTO">
                    </div>
                    <div class="col">
                    <p class="p-0 m-0" style="color: #F29E10; font-weight: bolder; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row3['name'].' '.$row3['m_initial'].' '.$row3['lname'] ?></p>
                    <p class="p-0 m-0" style="font-weight:lighter; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row3['course_name'] ?></p>
                    <p class="p-0 m-0" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row3['party_name'] ?></p>
                    </div>
                    <div class="col mb-3">
                    <p style="font-weight: 800;"><?php echo $row3['cand_votes'] ?></p>
                    <h4 class = "bi bi-star-fill" style="color: green;"></h4>
                    </div>
                    <?php $count++; }else{ ?>
                        <div class="col">
                    <img src="<?php echo "webimg/".$row3['photo'] ?>" class="img-table-responsive img-thumbnail" width="100" alt="PHOTO">
                    </div>
                    <div class="col">
                    <p class="p-0 m-0" style="color: #F29E10; font-weight: thick; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo $row3['name'].' '.$row3['m_initial'].' '.$row3['lname'] ?></p>
                    <p class="p-0 m-0"><?php echo $row3['course_name'] ?></p>
                    <p class="p-0 m-0"><?php echo $row3['party_name'] ?></p>
                    </div>
                    <div class="col">
                    <p style="font-weight: 800;"><?php echo $row3['cand_votes'] ?></p>
                    </div>

                  <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } } ?>
             
      
         </div>
         </div>
         

        <div class="pb-2"></div>
        
    

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>

function printDiv() {
//   var printContents = document.getElementById('print_result').innerHTML;
 
//   //window.document.write(document.all.items(printpage).innerHTML);

//   var originalContents = document.body.innerHTML;

//   document.body.innerHTML = printContents;
// const printFrame = document.getElementById('print_result');
// printFrame.style.display = 'none';
// printFrame.src = 'results.php';

// document.body.appendChild(printFrame);
// printFrame.contentWindow.focus();
// printFrame.contentWindow.print();
  window.print();
//   document.body.innerHTML = originalContents;
  }
        
   

   // var data = JSON.parse(response);
                       // console.log(data)
                       
               
                
            //console.log('gana');
                //     $.post('process_chart.php').then(response =>{
                //         var data = JSON.parse(response);
                //         console.log(data)
                //       

                // var options = {
                //             chart: {
                //                 type: 'bar'
                //             },
                //             series: [{
                //                 data:data.vice_president[0]
                //             }]
                //             }

                // var chart = new ApexCharts(document.querySelector("#chart1"), options);

                // chart.render()

                // var options = {
                //             chart: {
                //                 type: 'bar'
                //             },
                //             series: [{
                //                 data:data.Secretary[0]
                //             }]
                //             }

                // var chart = new ApexCharts(document.querySelector("#chart2"), options);

                // chart.render()

                // var options = {
                //             chart: {
                //                 type: 'bar'
                //             },
                //             series: [{
                //                 data:data.Treasurer[0]
                //             }]
                //             }

                // var chart = new ApexCharts(document.querySelector("#chart3"), options);

                // chart.render()

                // var options = {
                //             chart: {
                //                 type: 'bar'
                //             },
                //             series: [{
                //                 data:data.Auditor[0]
                //             }]
                //             }

                // var chart = new ApexCharts(document.querySelector("#chart4"), options);

                // chart.render()

                // var options = {
                //             chart: {
                //                 type: 'bar'
                //             },
                //             series: [{
                //                 data:data.PIO[0]
                //             }]
                //             }

                // var chart = new ApexCharts(document.querySelector("#chart5"), options);

                // chart.render()





                //)
   //}

    </script>
    
</body>
</html>
<canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($gender); ?>,
                datasets: [{
    label: 'Stock Availability',
    data: <?php echo json_encode($avail); ?>,
    backgroundColor: <?php 
        $colors = array();
        foreach($avail as $value) {
            if($value <= 100) {
                array_push($colors, '#FF6961'); //red color for availability less than 100
            } else {
                array_push($colors, '#83CDFF'); //default color for availability 100 or more
            }
        }
        echo json_encode($colors);
    ?>,
    borderColor: 'rgba(255, 99, 132, 1)',
    borderWidth: 1
},
                {
                    label: 'Deadline',
                    type: 'line',
                    data: Array(<?php echo count($avail); ?>).fill(<?php echo "10"; ?>),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderDash: [5, 5],
                    fill: false
                }
                
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>










<?php



     $result = mysqli_query($con, "SELECT tbl_register.name as avail , query.gender as gender
      FROM tbl_register
      JOIN query ON tbl_register.vaccine = query.query_id where tbl_register.id='$id';");

// create arrays to hold the data
$avail = array();
$gender = array();

// loop through the result set and populate the arrays
while ($rw = mysqli_fetch_assoc($result)) {
    $avail[] = $rw['name'];
    $gender[] = $rw['gender'];
}



         ?>
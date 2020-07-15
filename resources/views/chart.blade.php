<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <title>Mirai demo</title>
</head>

<body>
    <div class="container">
        <h2>Bar Chart</h2>
        <div class="bar">
            <canvas id="bar"></canvas>
        </div>

        <br>
        <br>
        <br>
        <h2>Hexagon Chart</h2>
        <div class="hexagon">
            <canvas id="hexagon"></canvas>
        </div>
    </div>
</body>
<script>
    const user1 = JSON.parse('{!! $user1 !!}');
    const user2 = JSON.parse('{!! $user2 !!}');
    const user3 = JSON.parse('{!! $user3 !!}');
    const ctx = document.getElementById('bar');
    let bar = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:  [user1.name, user2.name, user3.name ],
            datasets: [
                {
                    label:'bar',
                    data:[user1.total, user2.total, user3.total ],
                    backgroundColor: 'rgba(10, 20, 40, 0.1)'
                }
            ]
        },
        options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
    });

    const bts = document.getElementById('hexagon');
    let hexagon = new Chart(bts, {
        type: 'radar',
        data: {
            labels:  ['language', 'awareness', 'healthy'],
            datasets: [
                {
                    label: user1.name,
                    data:[user1.language, user1.awareness, user1.healthy],
                    backgroundColor: 'rgba(10, 20, 40, 0.1)'
                }
            ]
        },
        options: {

        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
    });
</script>

</html>

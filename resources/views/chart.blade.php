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
    <div class="export-excel">
        <form action="{{route('export')}}" method="POST" id="export">
            @csrf
            <div class="form-group">
                <input type="hidden" name="name[0]" value="{{$user1['name']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="language[0]" value="{{$user1['language']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="awareness[0]" value="{{$user1['awareness']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="healthy[0]" value="{{$user1['healthy']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="diligence[0]" value="{{$user1['diligence']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="logic[0]" value="{{$user1['logic']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="total[0]" value="{{$user1['total']}}">
            </div>

            <div class="form-group">
                <input type="hidden" name="name[1]" value="{{$user2['name']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="language[1]" value="{{$user2['language']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="awareness[1]" value="{{$user2['awareness']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="healthy[1]" value="{{$user2['healthy']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="diligence[1]" value="{{$user2['diligence']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="logic[1]" value="{{$user2['logic']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="total[1]" value="{{$user2['total']}}">
            </div>

            <div class="form-group">
                <input type="hidden" name="name[2]" value="{{$user3['name']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="language[2]" value="{{$user3['language']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="awareness[2]" value="{{$user3['awareness']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="healthy[2]" value="{{$user3['healthy']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="diligence[2]" value="{{$user3['diligence']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="logic[2]" value="{{$user3['logic']}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="total[2]" value="{{$user3['total']}}">
            </div>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Excel
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <button class="dropdown-item" type="submit" id="type" name="type" value = "xlsx">XLSX</button>
                  <button class="dropdown-item" type="submit" id="type" name="type" value = "csv">CSV</button>
                  <button class="dropdown-item" type="submit" id="type" name="type" value = "tsv">TSV</button>
                </div>
              </div>
        </form>
    </div>
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
        <br>
        <br>
        <div class="hexagon1">
            <canvas id="hexagon1"></canvas>
        </div>
        <br>
        <br>
        <div class="hexagon2">
            <canvas id="hexagon2"></canvas>
        </div>
    </div>

</body>
<script>
    const user1 = JSON.parse('{!! $user1 !!}');
    console.log(user1);
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
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    borderColor: 'rgba(68, 114, 196, 1)',
                    barThickness: 70
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
            labels:  ['language', 'awareness', 'healthy', 'diligence', 'logic'],
            datasets: [
                {
                    label: user1.name,
                    data:[user1.language, user1.awareness, user1.healthy, user1.diligence, user1.logic],
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    borderColor: 'rgba(68, 114, 196, 1)',
                    order: 0.5
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

    const bts1 = document.getElementById('hexagon1');
    let hexagon1 = new Chart(bts1, {
        type: 'radar',
        data: {
            labels:  ['language', 'awareness', 'healthy', 'diligence', 'logic'],
            datasets: [
                {
                    label: user2.name,
                    data:[user2.language, user2.awareness, user2.healthy, user2.diligence, user2.logic],
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    borderColor: 'rgba(68, 114, 196, 1)',
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

    const bts2 = document.getElementById('hexagon2');
    let hexagon2 = new Chart(bts2, {
        type: 'radar',
        data: {
            labels:  ['language', 'awareness', 'healthy', 'diligence', 'logic'],
            datasets: [
                {
                    label: user3.name,
                    data:[user3.language, user3.awareness, user3.healthy, user3.diligence, user3.logic],
                    backgroundColor: 'rgba(68, 114, 196, 1)',
                    borderColor: 'rgba(68, 114, 196, 1)',
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
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>

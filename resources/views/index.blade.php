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
    <form action="{{route('store')}}" method="POST">
        @csrf
        <h3>Personal 1</h3>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name[0]" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="language">Language</label>
                <input type="number" name="language[0]" class="form-control" id="language" placeholder="Enter point language">
            </div>
            <div class="form-group">
                <label for="awareness">Awareness</label>
                <input type="number" name="awareness[0]" class="form-control" id="awareness" placeholder="Enter point awareness">
            </div>
            <div class="form-group">
                <label for="healthy">Healthy</label>
                <input type="number" name="healthy[0]" class="form-control" id="healthy" placeholder="Enter point healthy">
            </div>
            <div class="form-group">
                <label for="diligence">Diligence</label>
                <input type="number" name="diligence[0]" class="form-control" id="diligence" placeholder="Enter point diligence">
            </div>
            <div class="form-group">
                <label for="logic">Logic</label>
                <input type="number" name="logic[0]" class="form-control" id="logic" placeholder="Enter point logic">
            </div>


            <h3>Personal 2</h3>
            <div class="form-group">
                <label for="name1">Name</label>
                <input type="text" name="name[1]" class="form-control" id="name1" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="language1">Language</label>
                <input type="number" name="language[1]" class="form-control" id="language1" placeholder="Enter point language">
            </div>
            <div class="form-group">
                <label for="awareness1">Awareness</label>
                <input type="number" name="awareness[1]" class="form-control" id="awareness1" placeholder="Enter point awareness">
            </div>
            <div class="form-group">
                <label for="healthy1">Healthy</label>
                <input type="number" name="healthy[1]" class="form-control" id="healthy1" placeholder="Enter point healthy">
            </div>
            <div class="form-group">
                <label for="diligence1">Diligence</label>
                <input type="number" name="diligence[1]" class="form-control" id="diligence1" placeholder="Enter point diligence">
            </div>

            <div class="form-group">
                <label for="logic1">Logic</label>
                <input type="number" name="logic[1]" class="form-control" id="logic1" placeholder="Enter point logic">
            </div>

            <h3>Personal 3</h3>
            <div class="form-group">
                <label for="name2">Name</label>
                <input type="text" name="name[2]" class="form-control" id="name2" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="language2">Language</label>
                <input type="number" name="language[2]" class="form-control" id="language2" placeholder="Enter point language">
            </div>
            <div class="form-group">
                <label for="awareness2">Awareness</label>
                <input type="number" name="awareness[2]" class="form-control" id="awareness2" placeholder="Enter point awareness">
            </div>
            <div class="form-group">
                <label for="healthy2">Healthy</label>
                <input type="number" name="healthy[2]" class="form-control" id="healthy2" placeholder="Enter point healthy">
            </div>
            <div class="form-group">
                <label for="diligence2">Diligence</label>
                <input type="number" name="diligence[2]" class="form-control" id="diligence2" placeholder="Enter point diligence">
            </div>
            <div class="form-group">
                <label for="logic2">Logic</label>
                <input type="number" name="logic[2]" class="form-control" id="logic2" placeholder="Enter point logic">
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</body>

</html>

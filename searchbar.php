i<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crop Comparison Selection</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    ul{
        background-color:#eee;
        cursor:pointer;
    }
    li{
        padding:12px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <form class="row" action="linegraph.php" method="post">
            <div class="form-group col-lg-3 col-lg-offset-2">
                <input type="text" name="cropA" id="crop1" class="form-control" style="height:50px" placeholder="Select First Crop" />
                <div id="crop1List"></div>
            </div>
            <div class="col-lg-2 text-center">
                <button type="submit" class="btn-lg btn-success">Compare!</button>
            </div>
             <div class="form-group col-lg-3">
                <input type="text" name="cropB" id="crop2" class="form-control" style="height:50px" placeholder="Select Second Crop" />
                <div id="crop2List"></div>
            </div>
                
            
        </form>
    </div>

</body>
</html>
<script>
    $(document).ready(function(){
        $('#crop1').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                $.ajax({
                    url: "api/search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#crop1List').fadeIn();
                        $('#crop1List').html(data);
                    }
                });
            }
        });
        $('#crop1List').on('click', 'li', function(){
            $('#crop1').val($(this).text());
            $('#crop1List').fadeOut();
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#crop2').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                $.ajax({
                    url: "api/search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#crop2List').fadeIn();
                        $('#crop2List').html(data);
                    }
                });
            }
        });
        $('#crop2List').on('click', 'li', function(){
            $('#crop2').val($(this).text());
            $('#crop2List').fadeOut();
        });
    });
</script>

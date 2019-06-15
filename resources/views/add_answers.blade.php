<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br />
    <br />
    <div class="table-responsive">
        <form method="post" id="dynamic_form">
            <input type="hidden" name="questionid" id="questionid'" value="{{$questionid}}">

            <span id="result"></span>
            <table class="table table-bordered table-striped" id="user_table">
                <thead>
                <tr>
                    <th width="35%">Answer</th>
                    <th width="35%">Right Answer</th>
                    <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" align="right">&nbsp;</td>
                    <td>
                        @csrf
                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                        <button onclick="goBack()" class="btn btn-primary"  >Go Back</button>

                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>
</body>
</html>

<script>
    function goBack() {
        window.history.back();
    }
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
            html = '<tr>';
            html += '<td><input type="text" name="answer[]" class="form-control" /></td>';
            html += '<td>  <label> <input type="checkbox" name="checked[]" value="1"> Right answer </label> <input type="hidden" name="checked[]" value="0"></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{ route("submitAnswer") }}',
                method:'POST',
                data:$(this).serialize(),
                dataType:'json',

                success:function(data)
                {
                    if(data.error)
                    {

                        $('#result').html('<div class="alert alert-danger">'+data.error+'</div>');



                    }
                    else
                    {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

    });
</script>
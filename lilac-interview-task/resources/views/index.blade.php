<!DOCTYPE html>
<html>

<head>
    <title>Interview Task</title>
    <link href="{{ url('app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="search-container">
                <label for="search-input" class="search-label">Search</label>
                <input type="text" class="search-input" placeholder="Search Name/Designation/Department">
            </div>
            <div class="box-container">
                <div class="box">
                    <h2>John Doe</h2>
                    <h3>Marketing Manager</h3>
                    <h4>Sales and marketing</h4>
                </div>
                <div class="box">
                    <h2>John Doe</h2>
                    <h3>Marketing Manager</h3>
                    <h4>Sales and marketing</h4>
                </div>
                <div class="box">
                    <h2>John Doe</h2>
                    <h3>Marketing Manager</h3>
                    <h4>Sales and marketing</h4>
                </div>
                <div class="box">
                    <h2>John Doe</h2>
                    <h3>Marketing Manager</h3>
                    <h4>Sales and marketing</h4>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('.search-input').on('input', function() {
            const query = $(this).val();

            $.ajax({
                url: "/search",
                method: "GET",
                data: {
                    query: query
                },
                sucess: function(response) {
                    console.log('hi from server')
                },
                error: function(status, error) {
                    console.log(error)
                }

            })
        });
    });
</script>

</html>

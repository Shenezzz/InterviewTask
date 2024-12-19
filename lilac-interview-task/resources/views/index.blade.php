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
                @forelse ($datas as $data)
                    <div class="box">
                        <h2>{{ $data->name }}</h2>
                        <h3>{{ $data->designation->name }}</h3>
                        <h4>{{ $data->department->name }}</h4>
                    </div>
                @empty

                @endforelse

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
                success: function(r) {

                    $('.box-container').empty();

                    if (r.length > 0) {
                        r.forEach(function(a) {
                            let boxHtml = `
                            <div class="box">
                                <h2>${a.name}</h2>
                                <h3>${a.designation.name}</h3>
                                <h4>${a.department.name}</h4>
                            </div>
                        `;
                            $('.box-container').append(
                                boxHtml);
                        });
                    } else {
                        $('.box-container').html(
                            '<label for="search-input" class="search-label">Try something else.</label>'
                        );
                    }
                },
                error: function(status, error) {
                    console.log(error)
                }

            })
        });
    });
</script>

</html>

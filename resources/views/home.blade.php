<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Task</title>
        <style>
            table {
                border: solid black 1px;
            }
            td {
                padding-right: 15px;
            }
        </style>
    </head>
    <body>
        <!-- <div>
            <pre>{{ print_r($data, true) }}</pre>
        </div> -->
        <table>
            @foreach($data as $result)
                <tr>
                    <td>{{ $result[0] }}</td>
                    <td>{{ $result[1] }}</td>
                    <td>{{ $result[2] }}</td>
                    <td>{{ $result[3] }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des reservations</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Liste des reservations</h2>
    <table>
        <thead>
            <tr>
                <th>id</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
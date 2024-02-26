<!DOCTYPE html>
<html>
<head>
    <title>Liste des voitures</title>
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
    <h2>Liste des voitures</h2>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>matricule</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voitures as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->matricule }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

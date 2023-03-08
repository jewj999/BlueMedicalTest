<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Num. placa</th>
                <th>Tiempo estacionado (min)</th>
                <th>Cantidad a pagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->license_plate_number }}</td>
                <td>{{ $vehicle->accumulated_minutes }}</td>
                <td>${{ $vehicle->accumulated_minutes * $vehicle->vehicleType->price_per_minute }}</td>
            </tr>
            @endforeach
    </table>
</body>

</html>

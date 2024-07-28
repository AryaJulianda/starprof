<!DOCTYPE html>
<html>

<head>
  <title>Form Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 100%;
      padding: 20px;
    }

    .content {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: auto;
    }

    h2 {
      color: #333333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #dddddd;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="content">
      <h2>Form Registration</h2>
      <table>
        <tr>
          <th>Field</th>
          <th>Details</th>
        </tr>
        <tr>
          <td><strong>Nama Lengkap Peserta:</strong></td>
          <td>{{ $nama_lengkap }}</td>
        </tr>
        <tr>
          <td><strong>Jenis Kelamin:</strong></td>
          <td>{{ $jenis_kelamin }}</td>
        </tr>
        <tr>
          <td><strong>Tempat Lahir:</strong></td>
          <td>{{ $tempat_lahir }}</td>
        </tr>
        <tr>
          <td><strong>Tanggal Lahir:</strong></td>
          <td>{{ $tanggal_lahir }}</td>
        </tr>
        <tr>
          <td><strong>Alamat Lengkap:</strong></td>
          <td>{{ $alamat_lengkap }}</td>
        </tr>
        <tr>
          <td><strong>Email Address:</strong></td>
          <td>{{ $email }}</td>
        </tr>
        <tr>
          <td><strong>No Handphone:</strong></td>
          <td>{{ $phone }}</td>
        </tr>
        <tr>
          <td><strong>Program Category:</strong></td>
          <td>{{ $program_category }}</td>
        </tr>
        <tr>
          <td><strong>Nama Program:</strong></td>
          <td>{{ $nama_program }}</td>
        </tr>
        <tr>
          <td><strong>Message:</strong></td>
          <td>{{ $text_message }}</td>
        </tr>
        <tr>
          <td><strong>Registration Date:</strong></td>
          <td>{{ $registration_date }}</td>
        </tr>
      </table>
    </div>
  </div>
</body>

</html>

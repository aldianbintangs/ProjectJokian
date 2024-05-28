<!DOCTYPE html>
<html lang="en">
{{-- check push pull --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Event</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        html,
        body {
            background: linear-gradient(to right, #162E52 0%, #214161 9%, #305E79 47%, #448699 100%);
            font-family: 'Lexend', sans-serif;

        }

        .profile {
            width: 348px;
            height: 80px;
            border-radius: 50px;
            background-color: white;
            text-align: center;
            font-size: 23px;
            margin-left: 70%;
        }

        .profile p {
            text-align: center;
            padding-top: 24px;
            color: black;
            font-weight: bold;
        }

        .box {
            width: 900px;
            height: 550px;
            background-color: white;
            border-radius: 10px;
            border: black 1px solid;
            box-shadow: inset;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .header {
            display: flex;
            font-size: 20px;
            margin-left: 30%;
            margin-right: auto;
        }

        .header img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-top: 20px;
        }

        .line {
            width: 800px;
            height: 2px;
            background-color: black;
            margin-left: auto;
            margin-right: auto;
        }

        .content {
            display: flex;
            margin-top: 30px;
            margin-left: 10%;
            margin-right: auto;
        }

        .calendar {
            margin-right: 20px;
        }

        input {
            width: 320px;
            height: 30px;
            font-family: 'Lexend', sans-serif;
            border-radius: 10px;
            box-shadow: inset;
            padding-left: 20px;
        }

        textarea {
            width: 300px;
            height: 150px;
            font-family: 'Lexend', sans-serif;
            border-radius: 10px;
            box-shadow: inset;
            padding: 20px;
        }

        button {
            width: 150px;
            height: 40px;
            padding: 10px;
            background-color: #366B7A;
            border: none;
            font-family: 'Lexend', sans-serif;
            border-radius: 10px;
            /* box-shadow: inset; */
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-left: 60%;
        }
    </style>
</head>

<body>
    <div class="profile">
        <p>Hi, Admin #name</p>
    </div>

    <div class="box">
        <div class="header">
            <img src=" {{ asset('assets/image/calendar_icons.png') }}" alt="">
            <h1>Tambahkan Event</h1>

        </div>
        <div class="line"></div>

        <div class="content">
            <div class="calendar">
                <p>Waktu Event</p>
                <input type="date">
            </div>
            <div class="details">
                <p>Event Name</p>
                <input type="text" cols="30">
                <p>Deskripsi Event</p>
                <textarea name="" id="" cols="40" rows="10"></textarea>
            </div>
        </div>
        <button>TAMBAH</button>
    </div>
</body>

</html>

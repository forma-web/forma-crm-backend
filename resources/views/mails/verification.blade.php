<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Подтверждение электронной почты</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
        }

        td {
            width: 600px;
            /*background-color: #718096;*/
            text-align: center;
            font-family: "Trebuchet MS", sans-serif;
        }

        a {
            display: inline-block;
            width: 200px;
            height: 50px;
            background-color: #F6B754;
            color: #ffffff;
            border-radius: 8px;
            line-height: 50px;
            text-decoration: none;
        }

        .fixed-block {
            height: 200px;
        }

        .auto-block {
            padding: 30px 0;
        }

        .logo {
            height: 200px;
        }
    </style>
</head>
<body>
<table>
    <tbody>
    {{--  Head  --}}
    <tr>
        <td class="fixed-block">
            <img class="logo" src="https://forma-web.ru/assets/logo.png" alt="Chemodan Logo">
        </td>
    </tr>
    {{--  Body  --}}
    <tr>
        <td class="auto-block">
            <h1>Привет, {{ $username }}!</h1>
            <span>
                    Для завершения регистрации сотрудника, пожалуйста,
                    подтвердите свой адрес электронной почты.
                </span>
        </td>
    </tr>
    <tr>
        <td class="auto-block">
            <a href="{{ $verificationUrl }}">Подтвердить почту</a>
        </td>
    </tr>
    {{--  Footer  --}}
    <tr>
        <td class="auto-block">
            &copy; Чемодан впечатлений 2020 - {{ now()->year }}
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>

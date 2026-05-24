<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600px" style="background: #ffffff; padding: 20px; border-radius: 8px;">
                    <tr>
                        <td>
                            <h2>👋 Bem-vindo, {{ $user->name }}!</h2>

                            <p>
                                Sua conta foi criada com sucesso 🎉
                            </p>

                            <p>
                                Agora você já pode acessar o sistema e começar a usar todas as funcionalidades.
                            </p>

                            <p>
                                Se precisar de ajuda, é só responder este email 😉
                            </p>

                            <hr>

                            <p style="font-size: 12px; color: #888;">
                                © {{ date('Y') }} - laravel app
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

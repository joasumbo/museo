<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #eee; border-radius: 5px; }
        .header { border-bottom: 2px solid #007bff; margin-bottom: 20px; }
        .footer { margin-top: 30px; font-size: 0.8em; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Olá, {{ $contact->name }}!</h2>
        </div>
        
        <p>Recebemos a sua mensagem e aqui está a nossa resposta:</p>
        
        <div style="background: #f9f9f9; padding: 15px; border-left: 4px solid #007bff;">
            {!! nl2br(e($replyMessage)) !!}
        </div>

        <p>Se tiver mais alguma questão, não hesite em contactar-nos.</p>

        <div class="footer">
            <p>Atentamente,<br><strong>A Equipa do Museu</strong></p>
            <hr>
            <p><em>Sua mensagem original:</em><br>
            "{{ $contact->message }}"</p>
        </div>
    </div>
</body>
</html>
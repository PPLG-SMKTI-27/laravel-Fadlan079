<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request — {{ $data['subject'] }}</title>
    <style>
        body  { margin: 0; padding: 0; background: #0f0f0f; font-family: 'Segoe UI', Arial, sans-serif; color: #e4e4e7; }
        .wrap { max-width: 560px; margin: 40px auto; background: #18181b; border: 1px solid #27272a; border-radius: 8px; overflow: hidden; }
        .top  { background: #09090b; padding: 24px 32px; border-bottom: 1px solid #27272a; }
        .top .label { font-size: 10px; text-transform: uppercase; letter-spacing: .12em; color: #71717a; }
        .top .filename { font-family: monospace; font-size: 13px; color: #a1a1aa; margin-top: 4px; }
        .body { padding: 32px; }
        .row  { display: flex; gap: 0; border-bottom: 1px solid #27272a; }
        .row:last-child { border-bottom: none; }
        .key  { width: 100px; flex-shrink: 0; padding: 12px 16px; font-size: 10px; text-transform: uppercase; letter-spacing: .1em; color: #71717a; background: #09090b; border-right: 1px solid #27272a; }
        .val  { padding: 12px 16px; font-size: 13px; color: #e4e4e7; flex: 1; }
        .msg-block { margin-top: 24px; background: #09090b; border: 1px solid #27272a; border-radius: 4px; padding: 20px; font-size: 14px; line-height: 1.75; white-space: pre-wrap; color: #d4d4d8; }
        .footer { padding: 20px 32px; border-top: 1px solid #27272a; font-size: 11px; color: #52525b; text-align: center; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="top">
            <div class="label">New incoming request · Portfolio</div>
            <div class="filename">request_new.txt</div>
        </div>

        <div class="body">
            <div class="row">
                <div class="key">Type</div>
                <div class="val">{{ ucfirst($data['type']) }}</div>
            </div>
            <div class="row">
                <div class="key">From</div>
                <div class="val">{{ $data['email'] }}</div>
            </div>
            <div class="row">
                <div class="key">Subject</div>
                <div class="val">{{ $data['subject'] }}</div>
            </div>

            <div class="msg-block">{{ $data['message'] }}</div>
        </div>

        <div class="footer">
            Sent via portfolio contact form · {{ now()->format('d M Y, H:i') }}
        </div>
    </div>
</body>
</html>

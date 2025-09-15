
<h1>{{ $contactInfo['name'] }}お問い合わせがありました</h1>

<p><strong>お名前:</strong> {{ $contactInfo['name'] }}</p>
<p><strong>お名前（フリガナ）:</strong> {{ $contactInfo['name_kana'] }}</p>
<p><strong>電話番号:</strong> {{ $contactInfo['phone'] }}</p>
<p><strong>メールアドレス:</strong> {{ $contactInfo['email'] }}</p>
<p><strong>本文:</strong></p>
<p>{{ $contactInfo['body'] }}</p>

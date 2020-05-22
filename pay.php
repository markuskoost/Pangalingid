<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - SEB - Pangalink-net</title>
    </head>
    <body>
<?php
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
$total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_FLOAT);

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEAzXVK6dL6aim7JHWz6paSB6F0eEvR4W3QHkGZiOP9MfGQRUUM
P/kSucW4mx4Y2Z0diq7MwinlhR4OGZCRA39XcTbdxc0IAq+8Q2zorb0eKvA7SE3p
Fsc4fZWzFvXJ/cnY3OjCkBDkqYj3EgHn9FJlXY7y9qK3InidIpgAvfOQ/L/hIQBh
HA8PVr9lezWscLk3PUDd0Jh6o3OV0mV8inVnM3VQtJPZC5/FPAG1Po6cZdvdJ7SB
p8OOvfA0SrDuaW1ErU0C9Z2wFSRtsv205Z+kh8Thtt6G+FIk/j4foxrdRyEvwGUJ
A13WSFR8k5jblZ72fu2iSyms4lEXGG/WqTfFNwIDAQABAoIBAQC/5WxpxjdDTuTO
4eyAD9AmtmMNNGu8LI+0orqfQ6opqqCAQkR1v9IAly6cGtlE7103OZpfQzhvQ6oR
sJfw91AZmxA5/g0cTTz+kMsl8rwpiKUmHDa3oq0dhuN1b24QzyTw96k5W73mptl1
BTi7VvX8E1bUixeXZ6YEOIqA3+wsU/KHL1US5OdpFDaXufpqyGvvExTM1rcLbxt6
OQNjvFNHkeRBB5Q1uiUzZPY1R7kJy23xfhrz1+uCsyFtYY9vC1MchDCl5NFbTVkC
O8LcmasZs3cO/zZN/GKvdz+OuThcXRrLUzMNf9yYOoXbjPN7utU/cyx0Jyubs6lg
hi23XTVJAoGBAOt2UrFQUOsW/RzsB0sXi7Kjxkf5REHIDj1ZPz+i6GyN6m/tofUD
/Z0IFYmDWlWxlsBSaQiNMCtWl42FNUFhixdD7oA5OTLM7WmgWEJIUGV2M6+Ll0C8
+G1ilZ6wmgaPm7PNu7kW2wLjM2TjWGSDPBIApbbYgDXJXAgVX1BIuuXNAoGBAN9h
ASNp0cwDDQagVZrjiSxbJpB4sNavsvTBHZUPIfwBnkjQstedmFVOYguPcyJXbAVw
HybfXjr4o6sDpwJPAghw7e+t2mLXZDZVLsevKVCHKma+BBByfIX4L8uc+iLl/Q7w
l1f52T5I4+OZIyW6cdgd5z49Cvin6fmvlZyS9JMTAoGAacao1VDwWPvlzxVVHW3B
awnZrEGVYTu+8d5i5HKJmSKTu550ED6vstiL3E+uyCpUP6eF2bqbdgybXo8F4o4w
Ts5MmTubr2+SA85td7FGtJ3KEEVUOFfr/i+4aSaKuwHOf5Kfj0FuN7jbQKpE7jpq
ROgXibFuvzrq5hK707Qoic0CgYEAjNY0SYemZuJljA/66TUcf4LYxa3SkQkl43r+
k8R+wMykZ3RtzdPm/6Hz3yYKiVRlHuiaO4AJgVTSnDgpTCNUPM42ti7+yeLTpA4A
+JVPjx4pda3IEjacnDrmp5HJg8dNzeWTBjzY45RBWnZq2pa6wG/aJDuId04nDu3N
fnKJEVECgYApLBBIkOBh/fAH1cIQv226fMoiL49D9Ptc/PlCvwUmSoK+zfzrV4W7
x5Jzb7nZjoM9DXLKpQTMP2NDZ3XXl3lvuZ/7STskAx59jY5AWxaLg5tQjz3It1F3
uvZ3tds1XmqalNCkEFWb6AnwYc7R1WuHC4QUC59dP/0OSAp51s9MCA==
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => $total,
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE171010123456789017",
        "VK_NAME"        => $firstName .' ' . $lastName,
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "https://pangalingid.tak17koost.itmajakas.ee/payment-successful.php/?payment_action=success",
        "VK_CANCEL"      => "https://pangalingid.tak17koost.itmajakas.ee/payment-canceled.php/?payment_action=cancel",
        "VK_DATETIME"    => "2020-05-21T17:27:05+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! SEB expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE171010123456789017 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/Ou76SIW1m6LPHdvF?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/Ou76SIW1m6LPHdvF?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-21T17:27:05+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/Ou76SIW1m6LPHdvF?payment_action=success068http://localhost:8080/project/Ou76SIW1m6LPHdvF?payment_action=cancel0242020-05-21T17:27:05+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* ocTFJwWSDnVsbsU4fE++o6rumYFJRRPjbTrxwjIMc1RZzc3k5agT/RtsQLckyveNw5wqQGNAS88ZilniZRLNhSUnz5foeZm/311f+ABxh+M1sn1nZrylTkUZGb/UPEbbuuX3zjvxWE+qbPBgZWxZzov5rO79aS6zNlfWia1tDc6MHHXjILxjIOzz5ycPQMM18X9HzApNkor8i3OEQV0X8iFwjLAI60iBw41izE4nEuwAa8Aq4SEmVc/zsCA4fLjn+DuVQYG3CqcaixxVs53sh7S5pCAtYuDYiZwNwWDMbA3wZq3jmVjoT8xYwnvyO/qd62RIQYoLPFGU7COU8ATnyg== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"SEB"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/seb-common">
            <!-- include all values as hidden form fields -->
<?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
<?php endforeach; ?>

            <!-- draw table output for demo -->
            <table>
<?php foreach($fields as $key => $val):?>
                <tr>
                    <td><strong><code><?php echo $key; ?></code></strong></td>
                    <td><code><?php echo htmlspecialchars($val); ?></code></td>
                </tr>
<?php endforeach; ?>

                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
            </table>
        </form>

    </body>
</html>

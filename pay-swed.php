<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - Swedbank - Pangalink-net</title>
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
MIIEpQIBAAKCAQEAy2srNL8EsmtL6PF1Ts9B6hFHgtS5fn1T5hZRhUWAqFsmRoS1
P44bYHOT2mg2wWOSzXt95F/o5y5uNRRIlL0RJQelV4AVr8gMEehy0gPK1KgQ1mBZ
8dP7Fj+aXxkQ/FuAtBzXH2VGIFTkmMwSKH8+5NU01iIiT/KX9hYAGrzFwFLDgsqQ
9jOzsZaxfhI1fXgNpMh5wSpZNp9OPOSB18Mdg6SRSsHF++C0Q34La0crqG5qW270
TppnOm0xAeOpvp3uB6nPNY4ZzdVAuXtns6UyhReK077eeBu3HZChG/An3zB1kWWr
lqctewONBPh91vflZ6HBd+L/fK5D6sG+zmWAYQIDAQABAoIBAQCUHFX7M9JRrro4
xAar+VB/A1HUOttM9CfwcfOtW+vPqX52/g2SVwAr/Dt9XT/xE3VCVFZXwFWubiok
T76BPiCLm8ORsFsaAEh5iYyAye4XZL/Nt54F7Fj33BukfnXVqTJO8mjYHT8wL1+6
uWvHPM8oguzTtUrSd0qaDW7KCQTbgJr+AzjljKwmn2oYutFNeOMu24AuFKb2K5Ww
aM3+F2Zag62H/WT2L/t9Pzhv+nfMvtl2FMinjKXn4iRoosAAJeKHnD0MJbPunkiF
VCj3JNxGy/9o/hoAyyDQR4yFJNlaz2K0kOOWR2OgfezZkdW1yPrYRnMCakWMQuVy
n0xzakWZAoGBAOykAJS4uHFoGWIJzcL/q6ukRmnYOJdaBQmr4zvdT09Y9yvEaTg6
iawq7RzOn/cL3//KG8hZ+d0CZXqk64vFqX+kLZcKRM3LLjWniQjVhh7KcnBefvNi
JVK6QUmonxskzeqwELRZJfy+CJPnsjYpBLKJTCbEKPVZnDBqZCfySZ9HAoGBANwP
ZLanZY3p7t6kK6wTf4h9pRmMJkCK/VNBY075ylaH7dQFZDC7H1XhNTHeuMgubxLe
ap91hBvvpbSnKK0iVEPplLj3ZLi7k+qzXxqTqz4HBHqEBvAwNkSnE6igr2dwVdSV
MjNifBVjijqZtsYpzJx+5cBAWqRaJ48AvhNlSMcXAoGAMoTElvtkbNmDabmcEsAQ
PyFf4uLFGhKetrTaWwJhFxhwFAjnSZi9oWK8ogS+g7gmRu43xirnO7ZyQZ+JpZo6
GETNcsw/aguxPsUYbSlga5xel/ykb4MJYsLeg0IbTWkrCKoztry9blqHbEPveL6D
ATZsam5ALDjILlHYNer0qqsCgYEAmiE1+zC30nP82HfIFtf5RVIrZv9gc2hmEgAE
XHZcH8tI6m10RSVqxy3bojhK1/qd1Wtu5ozaoO5y81r5BHq85mwdvIeaRkErUwGb
JPQ0xlcH7f+3FFfQSrly7XLOJ/boRuLQrGjYW+rCEFVFTPpN03aV2Ne6JM74UhLF
DrSsCrUCgYEA45kYA5n+UbpG5LjWC77U7GZ9saW8QatyjA7HVslOqK9hTco/sXY2
/x+H25PbqqR6MSHO+6MEnZzAeTmJVrJ5nxx7zv0lLcCPpw4IWTUC7uChfS5h+e0Y
lAPzvToXZgGyarg9R7CfeoR2ERRz6sZtnLV2pc7/c0bBlDiAADRoWn8=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100023",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => $total,
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE152200221234567897",
        "VK_NAME"        => $firstName .' ' . $lastName,
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "https://pangalingid.tak17koost.itmajakas.ee/payment-successful.php/?payment_action=success",
        "VK_CANCEL"      => "https://pangalingid.tak17koost.itmajakas.ee/payment-canceled.php/?payment_action=cancel",
        "VK_DATETIME"    => "2020-05-21T20:52:37+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100023 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/K3YxxP5K6PvibRkk?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/K3YxxP5K6PvibRkk?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-21T20:52:37+0300 */

/* $data = "0041011003008009uid10002300512345003150003EUR020EE152200221234567897009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/K3YxxP5K6PvibRkk?payment_action=success068http://localhost:8080/project/K3YxxP5K6PvibRkk?payment_action=cancel0242020-05-21T20:52:37+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* O+1+2hjgrasghb8voD198WpJBD9dTRY8oQLaTka5Bd+BJ/S/zRXyh2bzlOGDeSqphEGw/iBV7bB5JkaF9n1ilde7zc9qdkOH8DCkuXB5JEGQS8IFvfbc/bR4DUmPDaPEg/G5TSTrEQwJf5/gReW7t6UxvbgS5/ATSjEEUpD25dNknjjvlGexBwFH1Bl2vFbiDpFkwO+/If+7hKwZ0cvwKhidA3jBdIaheoGdCTq7gBxXLD68c8ibpBlTcojbCiewplzifQykqR+4CwBCHhJPyIRPzFfi7mxYqFJPZvkwqHM0heN3l0kB88PFChFJQV2gO6Sy55Mwr22tk94+JrvqlQ== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"SWED"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/swedbank-common">
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - SEB - Pangalink-net</title>
    </head>
    <body>
<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAzVtc4c6Mii4npGerrNc8P/9C0h2gLtXCFZj/9+MlVG8a0Ek7
CfSj3qVwqPqIJYUq74T1VlZ0+zdX71t0oxQsCsPLjmmw9mAmevjtlnAQH7LHVicM
NQjQT921GUi11rTDh7vLFtDyzR2Jo5GBsL0Bl8Ad0aBn7FQtcuVcOWyUNOBG4UvR
SVS/aRZPH7FhZGRijBZraFpmhFLfsark1oAjkaDgoeTnKyqS6vY9qRQlavSkfPul
8MDRbUckRZhEEiujD8j3wTsyopKDL3oeNKHRcnMD+tNFTWkL6gMJIAksGlbK7GO/
x6qu/37oMsDDByJU+oiRnKh+KyushDdq8wzDfwIDAQABAoIBAHmH5UsZUuD/+aP5
WocaheSV63Sv5blx9b+UYX/RZKk4a5TykccNieFc5XSLeAFEcyl29T6YQfjeQuM7
q6ZLbNkeEJyCfiEAvCUwpmLOhSxNQF0DFN1aDvYFDoUdG8gqCEGO6Nzi4Z50KZ2s
oiT3ZjbpknwZwwcAtjj19gNh97/mH3Sgx12HhST+7FW/cgV3LQgP0pajWZPgFGmi
E+Nwj1XmtRFGfqxYEVC8hxI+TJY14jhusz8MMWBRfxO42AO/5PF2ObrW5Cb0SrLR
CjBZhfGwx0GEiw1d7lj/i2EokqwOP9AnIa+CVmXz6irRdE1XpN9cqNE81QLrLXfx
2pnnmpECgYEA6vlm2++3L5R7eldT/udyJ1F9d9THNoZJVUtGD4ateYoG1LnZ3zD7
1Nrcpb0riNzt3urcPBkJR3HYbDFA4GNSVFqI6Ju8a/N6zedVHg9Hf1iH3spdCTnG
FRnZ+TmPPV+Hd9mAhESAnj7wn9HNpZOoTw9fVu0TxQz++lpAGpmTCBcCgYEA37uC
2Uhh4eJmPi50vSBn8qRJFMzfzEVJBACwtzQccHhqwsQ5oYaJgFzgvqQ5kVLxPqXp
WCet0f15DzYJkkPtmXFoxr0ZB5S74midM7nmE9nByyZqz+N/0zKFiFCjjmynazc5
Q6qVEQwaWda5hmTDt1b4TiNgKxp2wDqQba1VWNkCgYAx798UTtW3nu6/CWAohDeW
c5MerHHJ/LAJGH5DPnQPqG3bN8Q90sMycXEDKDjgVVOYVIGJpCh8ro04MR+AkJsm
ojcGeFKK/qvSpp9ITCb9wWrexlMPat/WDDBu7vSqLmsz5V2Svpw3BVlOHeB+l+rl
Inc4mhnhfumReyy0en7s8QKBgHxGGKl+xjgFXMt/XILNJFAoJxvxrQI3HhamF4K7
5GwoxwyGmIh7RZdSf9gFOqDZVH17BQFdkPSKehsT5f8j0i+gShXSZbvLRw29FEzu
Hrm6BCZGoZ/1+0Oh1YBhYmgzPE+Wri1C7Gg6s8xhNE5NXFVTbrtgdQOcQIgIP79c
P4MJAoGABz5e13bGh/6pPZq/04/vGGpwq6x+lHzWIeda/2ByBL1WQS56mjgDotUw
+JUu1JVGoqnyNX69G5uuKmgEBwBmq3AMCtMmlg5LAPGw1u/OS0lA9MtfuDaFX1YV
RBelFxXo+jC5kXARNI9sSwz8ujPReuDzA8J0Rp9YFkI6sG4GA2U=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE171010123456789017",
        "VK_NAME"        => "ÕIE MÄGER",
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "http://localhost:8080/project/7YtOy5w2UBHfTZkD?payment_action=success",
        "VK_CANCEL"      => "http://localhost:8080/project/7YtOy5w2UBHfTZkD?payment_action=cancel",
        "VK_DATETIME"    => "2020-05-21T12:30:20+0300",
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
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/7YtOy5w2UBHfTZkD?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/7YtOy5w2UBHfTZkD?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-21T12:30:20+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/7YtOy5w2UBHfTZkD?payment_action=success068http://localhost:8080/project/7YtOy5w2UBHfTZkD?payment_action=cancel0242020-05-21T12:30:20+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* f1ZKTdMXERSavnvELISaSFIwpOHMNCXIel9vGcKIjGae049n8E7JcVyaT5Sb4JgiG7T77z5SJW8HW59zXDcf4+jY/380UoPOgw6trn7ZInVu9QcrlX0khf2zZos1+fEc5Stxg4WYJrbYNfZfZyx25Xa4wfzGgSwYfHd6PrzIdnyMiUKuZLcEkh6zUpa2ZZAVAOmxgoH3h5JPK5FJb8D/RweE07tB3i7+jidGw6Mat1lVjWfoACI2Y/WzJdmyYQwG+9NQBJeELB4nSn2GPy2x/u1rR//XT+qfAgFYymqEaPHuT9lcEnVxDiGUjn+rlCJAoQcJeaYFPLpXAoG+Ojpi7g== */
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

<?php
$merchant_id = '10000100'; // Replace with your Merchant ID
$merchant_key = '46f0cd694581a'; // Replace with your Merchant Key
$return_url = 'https://yourdomain.com/success.php';
$cancel_url = 'https://yourdomain.com/cancel.php';
$notify_url = 'https://yourdomain.com/ipn.php';

$amount = '100.00'; // Amount in ZAR
$item_name = 'Test Product';

// Build the payment data string
$data = array(
    'merchant_id' => $merchant_id,
    'merchant_key' => $merchant_key,
    'return_url' => $return_url,
    'cancel_url' => $cancel_url,
    'notify_url' => $notify_url,
    'amount' => $amount,
    'item_name' => $item_name
);

// Optional: Add passphrase hash security (highly recommended)
$passphrase = 'your_passphrase'; // Leave blank if not using
$pfOutput = '';
foreach ($data as $key => $val) {
    if (!empty($val)) {
        $pfOutput .= $key . '=' . urlencode(trim($val)) . '&';
    }
}
$pfOutput = rtrim($pfOutput, '&');

if (!empty($passphrase)) {
    $signature = md5($pfOutput . '&passphrase=' . urlencode($passphrase));
    $data['signature'] = $signature;
}

?>

<form action="https://sandbox.payfast.co.za/eng/process" method="post">
    <?php
    foreach ($data as $name => $value) {
        echo "<input type='hidden' name='$name' value='$value' />";
    }
    ?>
    <input type="submit" value="Pay with PayFast" />
</form>

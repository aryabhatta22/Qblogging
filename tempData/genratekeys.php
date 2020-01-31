<?php

$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 1024,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);
   
$res = openssl_pkey_new($config);
openssl_pkey_export($res, $privKey);

// Extract the public key from $res to $pubKey
$pubKey = openssl_pkey_get_details($res);
$pubKey = $pubKey["key"];

echo $pubKey;

// Private key: $privKey
// public key: $pubKey

echo '</br></br></br>';

/*********Private and public key verification**********/

$data = "Verified";

  openssl_sign($data, $raw_signature, $privKey);
  $signature = base64_encode($raw_signature);
  $raw_signature = base64_decode($signature);
  $result = openssl_verify($data, $raw_signature, $pubKey);
  echo $result;
  
  //returns 1 if data and signature match
<?php 
function encrypt($pure_string) {    
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $_SESSION['iv'] = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, "10", utf8_encode($pure_string), MCRYPT_MODE_ECB, $_SESSION['iv']);
    $encrypted_string = base64_encode($encrypted_string);    
    return ($encrypted_string);    
}

function decrypt($encrypted_string) {     
    $string = base64_decode(($encrypted_string));

    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, "10",$string, MCRYPT_MODE_ECB, $_SESSION['iv']);
    return $decrypted_string;
}
/*$str=encrypt("Hello");
echo "Encry:".$str;
echo "<br>Decry:".decrypt($str);*/
?>
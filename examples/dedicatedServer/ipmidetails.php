<?php

use dashserv\api\dashservApiClient;

require_once __DIR__ . '/../bootstrap.php';
/** @var dashservApiClient $dsClient */

$dedicatedServerIpmi = $dsClient->dedicatedServer()->getIpmiData("o3qzt")->getData();

?>
<h2>
    IPMI access detail
</h2>
<pre>
IP:           <?= $dedicatedServerIpmi->ip ?><br>
Username:     <?= $dedicatedServerIpmi->username ?><br>
Password:     <?= $dedicatedServerIpmi->password ?>
</pre>

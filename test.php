<?php
	error_reporting(E_ALL);
	require_once("./vendor/autoload.php");
	echo("this is test page !!");
	echo("");

	$url = "http://qiita.com/annie/items/96b37ef94885510c1b6b";
	try{
	    $httpOptions = array('timeout' => '10');
	    $request = new HTTP_Request2($url, HTTP_Request2::METHOD_GET, $httpOptions);

        // 本番以外は証明書の検証を無効化
        //$request->setAdapter('curl');                       // cURLアダプターを使用（これを設定すると実際にはssl_verify_host, ssl_verify_peerの設定は不要）
        //$request->setConfig(array(
        //      'ssl_verify_host' => false                    // 自サーバーの証明書の検証を無効化
        //    , 'ssl_verify_peer' => false                    // 相手サーバーの証明書の検証を無効化
        //));
        //
     	$response = $request->send();
     	$html = $response->getBody();
     	print_r($html);
     	if (!$html) {
		    header('HTTP/1.0 403 Forbidden');
   	 		exit;
		}

    } catch (HTTP_Request2_Exception $e ){
	    print_R($e);
	    return false;
	} catch (Exception $e){
	    print_R($e);
	    return false;
	}
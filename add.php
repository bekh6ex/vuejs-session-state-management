<?php

$file = __DIR__ . '/items.json';
$fh = fopen( $file, 'c+' );
flock( $fh, LOCK_EX );

$contents = fread( $fh, filesize( $file ) );
$messages = json_decode( $contents ) ?: [];

$entityBody = file_get_contents( 'php://input' );

usleep(2e6);

$newItems = json_decode( $entityBody );
$idBase = random_int( 0, 1e12 );
foreach ( $newItems as $index => &$item) {
	$item->time = microtime( true) * 1000;
	$item->id = $idBase + $index;

	if ($item->text == 'fail') {
		http_response_code( 500 );
		die;
	} else {
		if ( is_object( $item ) ) {
			$messages[] = $item;
		}
	}
}

rewind( $fh );
ftruncate( $fh, 0 );
fwrite( $fh, json_encode( $messages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE ) );
flock( $fh, LOCK_UN );
fclose( $fh );

echo json_encode( $newItems );



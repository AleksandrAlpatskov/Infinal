<?php
	require __DIR__ . '/SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;
	
	// Edit this ->
	define( 'SQ_SERVER_ADDR', 'ark.infinal-online.de' );
	define( 'SQ_SERVER_PORT', 27015 );
	define( 'SQ_TIMEOUT',     3 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-
	
	$Timer = MicroTime( true );
	
	$Query = new SourceQuery( );
	
	$ARK_Info    = Array( );
	$ARK_Rules   = Array( );
	$ARK_Players = Array( );
	
	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
		//$Query->SetUseOldGetChallengeMethod( true ); // Use this when players/rules retrieval fails on games like Starbound
		
		$ARK_Info    = $Query->GetInfo( );
		$ARK_Players = $Query->GetPlayers( );
		$ARK_Rules   = $Query->GetRules( );
	}
	catch( Exception $e )
	{
		$Exception = $e;
	}
	finally
	{
		$Query->Disconnect( );
	}
	
	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
?>
<?php
# Extension to Use iframes to insert a webseite.
# From Minseong
# edited and enhanced by Dominik Sigmund
# 
# Enjoy !
if ( !defined( 'MEDIAWIKI' ) ) {
        die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}

$wgExtensionCredits['parserhook'][] = array(
	'name' => 'iDisplay',
	'version' => '1.9',
	'description' => 'Display sites in an iFrame, you may block them with a intersite',
	'author' => 'Dominik Sigmund and Others',
	'url' => 'http://fh-hfv-web02.hf.brnet.int/at-wiki/index.php/iDisplay'
);
# Define a setup function
$wgHooks['ParserFirstCallInit'][] = 'idisplay_Setup';
# Add a hook to initialise the magic word
$wgHooks['LanguageGetMagic'][]       = 'idisplay_Magic';

function idisplay_Setup( &$parser ) {
    # Set a function hook associating the magic word with our function
	$parser->setFunctionHook( 'idisplay', 'idisplay_Render' );
    return true;
}

function idisplay_Magic( &$magicWords, $langCode ) {
    # Add the magic word
    # The first array element is whether to be case sensitive, in this case (0) it is not case sensitive, 1 would be sensitive
    # All remaining elements are synonyms for our parser function
    $magicWords['idisplay'] = array( 0, 'idisplay', 'anysite' );
    # unless we return true, other parser functions extensions won't get loaded.
    return true;
}
function idisplay_Render( $parser, $input, $w='', $h='', $s='') {
    $width  = (int)$w > 0 ? (int)$w : 800;
    $height = (int)$h > 0 ? (int)$h : 600;

    if($s!='') {
        //intersite here! give it the input!
        $input = 'http://fh-hfv-web02.hf.brnet.int/at-wiki/extensions/iDisplay/inter.php?page='
            . str_replace("&","[",$input);
    }
        
    $output = Html::element( 'iframe', array(
        'width'  => $width,
        'height' => $height,
        'src'    => $input,
        'frameborder' => "0",
    ));
        
    return array($output, 'noparse' => true, 'isHTML' => true);
}
?>

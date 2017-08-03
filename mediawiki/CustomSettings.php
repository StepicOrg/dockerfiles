<?php

$wgLogo = "https://stepik.org/static/classic/ico/favicon_128.png";
$wgFavicon = "https://stepik.org/static/classic/ico/favicon.ico";

$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['move'] = false;

$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['createpage'] = true;
$wgGroupPermissions['user']['createtalk'] = true;
$wgGroupPermissions['user']['move'] = false;

$wgGroupPermissions['sysop']['edit'] = true;
$wgGroupPermissions['sysop']['createpage'] = true;
$wgGroupPermissions['sysop']['createtalk'] = true;
$wgGroupPermissions['sysop']['move'] = true;

$wgAllowImageTag = true;
$wgEnableUploads = true;

$wgJobRunRate = 1000;
$wgRunJobsAsync = false;

## Extensions
wfLoadExtension( 'WikiEditor' );

$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
$wgDefaultUserOptions['wikieditor-preview'] = 1;
$wgDefaultUserOptions['wikieditor-publish'] = 1;

wfLoadExtension( 'CategoryTree' );

$wgCategoryTreeDefaultOptions['mode'] = 'pages';
$wgCategoryTreeMaxDepth = array(CT_MODE_PAGES => 3, CT_MODE_ALL => 3, CT_MODE_CATEGORIES => 3);
$wgCategoryTreeDefaultOptions['depth'] = 3;
$wgCategoryTreeDefaultMode = CT_MODE_PAGES;
$wgCategoryTreeDisableCache = 10;

wfLoadExtension( 'Math' );

$wgDefaultUserOptions['math'] = 'mathml';
$wgMathFullRestbaseURL='https://api.formulasearchengine.com/';

require_once "$IP/extensions/OpenID/OpenID.php";

$wgOpenIDLoginOnly = true;
$wgOpenIDMode = 'consumer';
$wgOpenIDTrustEmailAddress = true;
$wgOpenIDForcedProvider = 'https://stepik.org/openid/xrds/';
$wgOpenIDAllowExistingAccountSelection = false;
$wgOpenIDAllowAutomaticUsername = false;
$wgOpenIDSmallLogoUrl = 'https://stepik.org/static/classic/ico/favicon_16.png';

require_once "$IP/extensions/DeleteBatch/DeleteBatch.php";

$wgGroupPermissions['bureaucrat']['deletebatch'] = false;
$wgGroupPermissions['sysop']['deletebatch'] = true;

require_once "$IP/extensions/Collection/Collection.php";

$wgCollectionMWServeURL = getenv('MEDIAWIKI_PDF_RENDERER_URL');

$wgGroupPermissions['user']['collectionsaveascommunitypage'] = true;
$wgGroupPermissions['user']['collectionsaveasuserpage'] = true;

wfLoadExtension( 'SyntaxHighlight_GeSHi' );

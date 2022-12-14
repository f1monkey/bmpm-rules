<?php

$type = 'gen';
$options = getopt('t::');

if (isset($options['t']) && $options['t'] !== null) {
    $type = $options['t'];
    if (!$type) {
        die('-t option must be provided');
    }
}
$_GET['type'] = $type;

const DIR_PREFIX = 'bmpm' . DIRECTORY_SEPARATOR;

$files = glob(DIR_PREFIX . "$type/*.php");

if (!file_exists(DIR_PREFIX . $type)) {
    die(sprintf('invalid type "%s"', $type));
}

require_once DIR_PREFIX . "phoneticengine.php";

require_once DIR_PREFIX . "phoneticutils.php";


foreach ($files as $file) {
    if (($file === DIR_PREFIX ."$type/languagenames1.php") || ($file === DIR_PREFIX ."$type/languagenames2.php")) {
        continue;
    }
    require_once($file);
}

//$vars = get_defined_vars();
//ksort($vars);
//echo json_encode($vars); die();

/**
 * @param array $data
 * @return array
 */
function makeRulePatterns(array $data) {
    $result = [];
    /** @var string[] $patterns */
    foreach ($data as $patterns) {
        if (count($patterns) < 4) {
            continue;
        }
        $result[] = [
            'patterns' => $patterns
        ];
    }
    return $result;
}

$finalRules = [
    'approx' => [
        'first' => makeRulePatterns($approxCommon),
    ],
    'exact' => [
        'first' => makeRulePatterns($exactCommon),
    ],
];

$approxResult = [];
foreach ($approx as $langIndex => $ruleSet) {
    $approxResult[] = [
        'lang' => $langIndex,
        'rules' => makeRulePatterns($ruleSet),
    ];
}
$finalRules['approx']['second'] = $approxResult;

$exactResult = [];
foreach ($exact as $langIndex => $ruleSet) {
    $exactResult[] = [
        'lang' => $langIndex,
        'rules' => makeRulePatterns($ruleSet),
    ];
}
$finalRules['exact']['second'] = $exactResult;


$ruleResult = [];
foreach ($rules as $langIndex => $ruleSet) {
    $langCode = $languages[$langIndex];
    $ruleResult[$langCode] = makeRulePatterns($ruleSet);
}

$languageRulesResult = [];
foreach ($languageRules as  $rule) {
    $languageRulesResult[] = [
        "pattern" => $rule[0],
        "langs" => $rule[1],
        "accept" => $rule[2],
    ];
}

$discards = [];
switch ($type) {
    case 'ash': {
        $discards = [
            "ben", "bar", "ha"
        ];
        break;
    }
    case 'gen': {
        $discards = [
            "abe", "aben", "abi", "abou", "abu", "al", "bar", "ben", "bou", "bu",
            "d", "da", "dal", "de", "del", "dela","della", "des", "di", "dos", "du",
            "el", "la", "le", "ibn", "van", "von", "ha", "vanden", "vander"
        ];
        break;
    }
    case 'sep': {
        $discards = [
            "abe", "aben", "abi", "abou", "abu", "al", "bar", "ben", "bou", "bu",
            "d", "da", "dal", "de","del", "dela","della", "des", "di",
            "el", "la", "le", "ibn", "ha"
        ];
        break;
    }
}


$data = array(
    'languages' => $languages,
    'rules' => $ruleResult,
    'finalRules' => $finalRules,
    'langRules' => $languageRulesResult,
    'discards' => $discards,
);

file_put_contents("$type.json", json_encode($data));
